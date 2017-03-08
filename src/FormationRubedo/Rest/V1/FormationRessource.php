<?php
namespace FormationRubedo\Rest\V1;

use Rubedo\Services\Manager;
use RubedoAPI\Entities\API\Definition\FilterDefinitionEntity;
use RubedoAPI\Entities\API\Definition\VerbDefinitionEntity;
use RubedoAPI\Rest\V1\AbstractResource;

class FormationResource extends AbstractResource {
    function __construct()
    {
        parent::__construct();
        $this->define();
    }

    protected function define()
    {
        $this
            ->definition
            ->setName('Formations')
            ->setDescription('Description')
            ->editVerb('get', function(VerbDefinitionEntity &$entity) {
                $entity
                    ->setDescription('Get data')
                    ->addOutputFilter(
                        (new FilterDefinitionEntity())
                            ->setDescription('Formations')
                            ->setKey('formations')
                            ->setRequired()
                    );
            })->editVerb('post', function(VerbDefinitionEntity &$entity) {
                $entity
                    ->setDescription('Ajouter une formation')
                    //->identityRequired()
                    ->addInputFilter(
                        (new FilterDefinitionEntity())
                            ->setDescription('Titre')
                            ->setKey('titre')
                            ->setRequired()
                    )
                    ->addOutputFilter(
                        (new FilterDefinitionEntity())
                            ->setDescription('Formations')
                            ->setKey('formations')
                            ->setRequired()
                    );
            });
    }


    public function postAction($params)
    {
        $newFormation=["titre"=>$params["titre"]];
        $data=Manager::getService("Formation")->create($newFormation);
        return [
            "success"=>$data["success"],
            "formations"=>$data["data"]
        ];
    }

    public function getAction($params)
    {
        $data=Manager::getService("Formation")->getList();
        return [
            "success"=>true,
            "formations"=>$data["data"]
        ];
    }
}
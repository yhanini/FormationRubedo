<?php
namespace FormationRubedo\Rest\V1;

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
            });
    }

    public function getAction($params)
    {
        $data=Manager::getService("Formations")->getList();
        return [
            "success"=>true,
            "formations"=>$data["data"]
        ];
    }
}
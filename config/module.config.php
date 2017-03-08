<?php
return array(
    'templates' => array(
        'themes' => array(
            'formation' => array(
                'label' => 'Formation',
                'basePath' => realpath(__DIR__ . '/../theme/formation'),
                'noBootstrap' => true,
                'css' => array(
                    '/css/bootstrap.min.css',
                ),
                'js' => array(
                    '/js/blockDefinition.js',
                )
            ),
        )
   ),
   'blocksDefinition' => array(
       'navigation-inverted' => array(
           'maxlifeTime' => 60,
           'definitionFile' =>  realpath(__DIR__) . '/blocks/navigation-inverted.json'
       ),
       'formation' => array(
           'maxlifeTime' => 60,
           'definitionFile' =>  realpath(__DIR__) . '/blocks/formation.json'
       ),
   ),
    'service_manager' => array(
        'invokables' => array(
            'Formation' => 'FormationRubedo\\Collection\\Formation',
        )
    ),
    'namespaces_api' => array(
        'FormationRubedo',
    ),
);


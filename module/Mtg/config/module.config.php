<?php
return [
    'router' => [
        'routes' => [
            'default' => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/[:controller]',
                    'constraints' => [
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                    'defaults' => [
                        '__NAMESPACE__' => 'Mtg\Controller',
                        'controller' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'abstract_factories' => [
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ],
        'factories' => [
            'Mtg\RulesImporter' => 'Mtg\RulesImporter\Factory',
        ],
    ],
    'controllers' => [
        'invokables' => [
            'Mtg\Controller\Index' => 'Mtg\Controller\IndexController',
            'Mtg\Controller\Import' => 'Mtg\Controller\ImportController',
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
    // Placeholder for console routes
    'console' => [
        'router' => [
            'routes' => [
                'import' => [
                    'options' => [
                        'route' => 'import <filePath>',
                        'defaults' => [
                            'controller' => 'Mtg\Controller\Import',
                            'action' => 'import',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'doctrine' => [
        'driver' => [
            'AnnotationDriver' => [
                'paths' => [
                    __DIR__ . '/../src/Mtg/Model',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'Mtg\Model' => 'AnnotationDriver',
                ],
            ],
        ],
    ],
];

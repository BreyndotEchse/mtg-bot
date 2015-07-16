<?php
return [
    'router' => [
        'routes' => [
            'default' => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/[:controller[/:id]]',
                    'constraints' => [
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[A-Za-z0-9\.]+',
                    ],
                    'defaults' => [
                        '__NAMESPACE__' => 'Mtg\Controller',
                        'controller' => 'index',
                    ],
                ],
            ],
            'rulesearch' => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/rule/search/:token',
                    'constraints' => [
                        'token' => '[^/]*',
                    ],
                    'defaults' => [
                        '__NAMESPACE__' => 'Mtg\Controller',
                        'controller' => 'rule',
                        'action' => 'search',
                    ],
                ],
            ],
            'glossarysearch' => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/glossary/search/:token',
                    'constraints' => [
                        'token' => '[^/]*',
                    ],
                    'defaults' => [
                        '__NAMESPACE__' => 'Mtg\Controller',
                        'controller' => 'glossary',
                        'action' => 'search',
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
        ],
        'factories' => [
            'Mtg\Controller\Import' => 'Mtg\Controller\ImportControllerFactory',
            'Mtg\Controller\Rule' => 'Mtg\Controller\RuleControllerFactory',
            'Mtg\Controller\Glossary' => 'Mtg\Controller\GlossaryControllerFactory',
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

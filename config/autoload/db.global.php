<?php
return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
            ],
        ],
        'configuration' => [
            'orm_default' => [
                'driver' => 'orm_default',
                'proxy_dir' => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace' => 'DoctrineORMModule\Proxy',
                'metadata_cache' => 'array',
                'query_cache' => 'array',
                'result_cache' => 'array',
                'generate_proxies' => true,
            ],
        ],
        'driver' => [
            'AnnotationDriver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
            ],
        ],
        'cache' => [
            'memcached' => [
                'instance'  => 'doctrineMemcached',
            ],
        ],
    ],
];

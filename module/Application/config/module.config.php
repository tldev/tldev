<?php

return array(
    'router' => array(
        'routes' => array(
            'index' => array(
                'type'    => 'regex',
                'options' => array(
                    'regex'    => '\/(?P<uri>((index)?(\.[a-zA-Z]+)?)?)',
                    'spec' => '/%uri%',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
            ),
            'about' => array(
                'type' => 'regex',
                'options' => array(
                    'regex' => '\/(?P<uri>(about)(\.[a-zA-Z]+)?)',
                    'spec' => '/%uri%',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Index',
                        'action' => 'about'
                    )
                )
            ),
            'contact' => array(
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/contact',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'contact',
                    ),
                ),
            ),
            'lazy' => array(
                'type' => 'regex',
                'options' => array(
                    'regex' => '\/(?P<uri>(lazy)(\.[a-zA-Z]+)?)',
                    'spec' => '/%uri%',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Index',
                        'action' => 'lazy',
                    )
                )
            ),
            'markers' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/numbered-google-map-markers',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Index',
                        'action' => 'markers',
                    )
                )
            ),
            'markdown' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/markdown',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Markdown',
                        'action' => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'markdown-to-html' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/markdown-to-html',
                            'defaults' => array(
                                'action' => 'markdown-to-html'
                            )
                        )
                    )
                )
            )
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Application\Service\FormCreator' => 'Application\Service\Factory\FormCreatorFactory',
            'Application\Service\BlogPublisher' => 'Application\Service\Factory\BlogPublisherFactory',
            'blogger' => 'Application\Service\Factory\BloggerFactory',
        ),
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
            'Application\Repository\Factory\AbstractRepositoryFactory'
        ),
        'invokables' => array(
            'Application\Service\UriMadness' => 'Application\Service\UriMadness'
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Application\Controller\Blog' => 'Application\Controller\Factory\BlogControllerFactory'
        ),
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Markdown' => 'Application\Controller\MarkdownController'
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(
            'disqus' => 'Application\View\Helper\Disqus'
        ),
        'factories' => array(
            'author' => 'Application\View\Helper\Factory\AuthorFactory',
            'randomExtension' => 'Application\View\Helper\Factory\RandomExtensionFactory'
        )
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Application/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' => 'application_entities'
                )
            )
        ),
        'connection' => array(
            // default connection name
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host'     => 'localhost',
                    'port'     => '3306',
                    'user'     => 'root',
                    'password' => '',
                    'dbname'   => 'tldev',
                )
            )
        ),
        'eventmanager' => array(
            'orm_default' => array(
                'subscribers' => array(
                    'Gedmo\SoftDeleteable\SoftDeleteableListener',
                    'Gedmo\Timestampable\TimestampableListener'
                )
            )
        ),
        'configuration' => array(
            'orm_default' => array(
                'filters' => array(
                    'soft-deleteable' => 'Gedmo\SoftDeleteable\Filter\SoftDeleteableFilter'
                )
            )
        ),
        'repositories' => array(
            'blog-repo' => 'Application\Entity\Blog'
        )
    )
);

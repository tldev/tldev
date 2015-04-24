<?php

return array(
    'router'          => array(
        'routes' => array(
            'index'    => array(
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index'
                    )
                )
            ),
            'about'    => array(
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/about',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'about'
                    )
                )
            ),
            'contact'  => array(
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/contact',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'contact'
                    )
                )
            ),
            'markers'  => array(
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/numbered-google-map-markers',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'markers'
                    )
                )
            ),
            'resume' => array(
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/resume',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'resume'
                    )
                )
            ),
            'download' => array(
                'type'    => 'regex',
                'options' => array(
                    'regex'    => '/download/(?<filename>[a-zA-Z0-9_-]+)(\.(?<ext>(txt|pdf|docx)))?',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Download',
                        'action'     => 'resume'
                    ),
                    'spec'     => '/download/%filename%.%ext%'
                )
            )
        ),
    ),
    'service_manager' => array(
        'factories'          => array(
            'Application\Service\ResumeDownload' => 'Application\Service\Factory\ResumeDownload',
            'DropboxClient'                      => 'Application\Service\Factory\DropboxClient',
            'ResumeFilesystem'                   => 'Application\Service\Factory\ResumeFilesystem',
            'LocalFilesystemCache'               => 'Application\Service\Factory\LocalFilesystemCache'
        ),
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory'
        )
    ),
    'controllers'     => array(
        'invokables' => array(
            'Application\Controller\Index'    => 'Application\Controller\IndexController',
            'Application\Controller\Download' => 'Application\Controller\DownloadController'
        ),
    ),
    'view_helpers'    => array(
        'invokables' => array(
            'disqus' => 'Application\View\Helper\Disqus'
        ),
        'factories'  => array(
            'author' => 'Application\View\Helper\Factory\AuthorFactory'
        )
    ),
    'view_manager'    => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map'             => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack'      => array(
            __DIR__ . '/../view',
        ),
    )
);

<?php

return array(
    'modules' => array(
        'DoctrineModule',
        'DoctrineORMModule',
        //'ZendDeveloperTools',
        'Application',
        'LifecycleEvents',
        'TwbBundle'
    ),
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor'
        ),
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php'
        )
    )
);

<?php

$replacments = [
    'slug' => 'pm2-modern-plugin',
    'composer' => [
        'vendor' => 'vendor-slug',
        'package' => 'plugin',
        'VendorNamespace' => 'VendorNamespace',
        'PluginNamespace' => 'PluginNamespace',
        'PluginClass' => 'Plugin'
    ],
    'description' => 'PLUGIN_DESCRIPTION',

    'github' => [
        'org' => 'GITHUB_ORG',
        'repo' => 'GITHUB_REPO',
    ],
    'plugin' => [
        'name' => 'PLUGIN_NAME',
        'uri' => 'PLUGIN_URI',
        'author' => [
            'name' => 'PLUGIN_AUTHOR_NAME',
            'URI' => 'PLUGIN_AUTHOR_URI',
        ],
        'requires' => [
            'php' => 'PLUGIN_REQUIRES_PHP',
            'wp' => 'PLUGIN_REQUIRES_WP',
        ],
    ],
    'prefix' => [
        'constant' => 'PM2_MODERN',
        'function' => 'pm2_modern',
        'action' => 'ACTION_PREFIX',
    ],

];

<?php

$replacments = [
    'main-file' => 'pm2-modern-plugin',
    'slug' => 'pm2-modern-plugin',
    'version' => '0.1.0',
    'description' => 'PLUGIN_DESCRIPTION',
    'composer' => [
        'vendor' => 'vendor-slug',
        'package' => 'plugin',
        'VendorNamespace' => 'VendorNamespace',
        'PluginNamespace' => 'PluginNamespace',
        'PluginClass' => 'Plugin'
    ],
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
    'block' => [
        'files' => 'src/block',
        [
            'title' => 'BLOCK_TITLE',
            'description' => 'BLOCK_DESCRIPTION',
            'name' => 'pm2-modern-plugin/block-name',
            'textdomain' => 'pm2-modern-plugin',
            'category' => 'text',
            'icon' => 'smiley',
            'version' => '0.1.0',
        ]
    ]

];

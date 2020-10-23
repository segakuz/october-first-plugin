<?php namespace SergeiKuznetsov\JuniorTestPlugin;

use Backend;
use System\Classes\PluginBase;

/**
 * JuniorTestPlugin Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'JuniorTestPlugin',
            'description' => 'JuniorTestPlugin description',
            'author'      => 'SergeiKuznetsov',
            'icon'        => 'icon-cubes'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'SergeiKuznetsov\JuniorTestPlugin\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'sergeikuznetsov.juniortestplugin.some_permission' => [
                'tab' => 'JuniorTestPlugin',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        //return []; // Remove this line to activate

        return [
            'juniortestplugin' => [
                'label'       => 'JuniorTestPlugin',
                'url'         => Backend::url('sergeikuznetsov/juniortestplugin/products'),
                'icon'        => 'icon-cubes',
                'permissions' => ['sergeikuznetsov.juniortestplugin.*'],
                'order'       => 500,

                'sideMenu' => [
                    'products' => [
                        'label'       => 'Products',
                        'icon'        => 'icon-copy',
                        'url'         => Backend::url('sergeikuznetsov/juniortestplugin/products'),
                        'permissions' => ['sergeikuznetsov.juniortestplugin.*'],
                    ],
                    'categories' => [
                        'label'       => 'Categories',
                        'icon'        => 'icon-copy',
                        'url'         => Backend::url('sergeikuznetsov/juniortestplugin/categories'),
                        'permissions' => ['sergeikuznetsov.juniortestplugin.*'],
                    ]
                ]
            ],
        ];
    }
}

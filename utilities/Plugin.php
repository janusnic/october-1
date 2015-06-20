<?php namespace GoodWorx\Utilities;

use System\Classes\PluginBase;
use Backend;

/**
 * Utilities Plugin Information File
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
            'name'        => 'Utilities',
            'description' => 'Various utility components',
            'author'      => 'GoodWorx',
            'icon'        => 'icon-globe'
        ];
    }

    public function registerNavigation()
    {
        return[
            'website' => [
                'label'         => 'WWW',
                'url'           => Backend::url('goodworx/utilities/sermons'),
                'icon'          => 'icon-globe',
                'permissions'   => ['website.*'],
                'order'         => 100,

                'sideMenu' => [
                    'people' => [
                        'label'       => 'People',
                        'icon'        => 'icon-user',
                        'url'         => Backend::url('goodworx/utilities/people'),
                        'permissions' => ['website.*']
                    ],
                    'series' => [
                        'label'       => 'Series',
                        'icon'        => 'icon-pie-chart',
                        'url'         => Backend::url('goodworx/utilities/series'),
                        'permissions' => ['website.*']
                    ],
                    'sermons' => [
                        'label'       => 'Sermons',
                        'icon'        => 'icon-microphone',
                        'url'         => Backend::url('goodworx/utilities/sermons'),
                        'permissions' => ['website.*']
                    ]
                ]
            ]
        ];
    }

    public function registerComponents()
    {
        return [
            'GoodWorx\Utilities\Components\People' => 'peopleDetails',
            'GoodWorx\Utilities\Components\Sermon' => 'sermonPlayer',
            'GoodWorx\Utilities\Components\Series' => 'seriesPlayer'
        ];
    }

}

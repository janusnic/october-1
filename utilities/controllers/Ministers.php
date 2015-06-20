<?php namespace MichaelBishop\Website\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Ministers Back-end Controller
 */
class Ministers extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('MichaelBishop.Website', 'website', 'ministers');
    }
}
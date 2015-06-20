<?php namespace MichaelBishop\Website\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Roles Back-end Controller
 */
class Roles extends Controller
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

        BackendMenu::setContext('MichaelBishop.Website', 'website', 'roles');
    }
}
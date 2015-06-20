<?php namespace GoodWorx\Utilities\Components;

use Cms\Classes\ComponentBase;
use GoodWorx\Utilities\Models\Person;

class People extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'People Component',
            'description' => 'Provides lists of people details'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->people = Person::lists('fullname');
    }
}
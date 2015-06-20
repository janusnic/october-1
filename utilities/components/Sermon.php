<?php namespace GoodWorx\Utilities\Components;

use Cms\Classes\ComponentBase;
use GoodWorx\Utilities\Models\Sermon as Sermons;
use GoodWorx\Utilities\Models\Series;

class Sermon extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Sermon Component',
            'description' => 'MP3 player for sermons'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $id=$this->param('id');
        if ($id){
            $this->addJs('assets/mediaelement/lib/mediaelement.js');
            $this->addJs('assets/mediaelement/lib/mediaelementplayer.js');
            $this->addCss('assets/mediaelement/skin/mediaelementplayer.css');
            $this->sermon=Sermons::with('series','person')->find($id);
        } else {
            $this->sermon=Sermons::with('series','person')->orderBy('sermondate','desc')->first();
        }
        $this->sermondate=date("d F",strtotime($this->sermon->sermondate));
    }
}
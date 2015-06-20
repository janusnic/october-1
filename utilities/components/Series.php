<?php namespace GoodWorx\Utilities\Components;

use Cms\Classes\ComponentBase;
use GoodWorx\Utilities\Models\Sermon as Sermons;
use GoodWorx\Utilities\Models\Series as SermonSeries;

class Series extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Series Component',
            'description' => 'MP3 player for a series of sermons'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $id=$this->param('id');
        $this->addJs('assets/mediaelement/lib/mediaelement.js');
        $this->addJs('assets/mediaelement/lib/mediaelementplayer.js');
        $this->addJs('assets/mediaelement/playlist/mep-feature-playlist.js');    
        $this->addCss('assets/mediaelement/skin/mediaelementplayer.css');
        $this->addCss('assets/mediaelement/playlist/mep-feature-playlist.css');
        if (strpos($_SERVER['REQUEST_URI'],'series/'.$id)){
            $this->sermons=Sermons::with('person')->where('series_id','=',$id)->get();
            $this->series=SermonSeries::find($id);
        } else {
            $this->sermon=Sermons::with('series','person')->find($id);
        }
    }
}
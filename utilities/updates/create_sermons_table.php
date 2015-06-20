<?php namespace MichaelBishop\Website\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateSermonsTable extends Migration
{

    public function up()
    {
        Schema::create('michaelbishop_website_sermons', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->integer('person_id')->unsigned()->index();
            $table->integer('series_id')->unsigned()->index();
            $table->date('sermondate');
            $table->string('readings');
            $table->string('url')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('michaelbishop_website_sermons');
    }

}

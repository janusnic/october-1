<?php namespace MichaelBishop\Website\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreatePeopleTable extends Migration
{

    public function up()
    {
        Schema::create('michaelbishop_website_people', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('fullname')->nullable();
            $table->string('bio')->nullable;
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('michaelbishop_website_people');
    }

}

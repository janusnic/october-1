<?php namespace MichaelBishop\Website\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateMinistersTable extends Migration
{

    public function up()
    {
        Schema::create('michaelbishop_website_ministers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('michaelbishop_website_ministers');
    }

}

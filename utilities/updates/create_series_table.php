<?php namespace MichaelBishop\Website\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateSeriesTable extends Migration
{

    public function up()
    {
        Schema::create('michaelbishop_website_series', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('michaelbishop_website_series');
    }

}

<?php namespace MichaelBishop\Website\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateRolesTable extends Migration
{

    public function up()
    {
        Schema::create('michaelbishop_website_roles', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('rolename')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('michaelbishop_website_roles');
    }

}

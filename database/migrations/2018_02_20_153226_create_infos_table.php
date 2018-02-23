<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo', 150);
            $table->string('first_name', 15);
            $table->string('last_name', 15);
            $table->date('dtn');
            $table->string('address',50);
            $table->integer('tel');
            $table->timestamps();
        });
        Schema::table('users',function (Blueprint $table){
            $table->integer('info_id')->unsigned()->index()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infos');
    }
}

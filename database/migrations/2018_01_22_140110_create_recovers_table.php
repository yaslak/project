<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recovers', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('email');
            $table->string('token',100)->nullable();
            $table->timestamps();
        });
        Schema::table('users',function (Blueprint $table){
            $table->integer('recover_id')->unsigned()->index()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recovers');
    }
}

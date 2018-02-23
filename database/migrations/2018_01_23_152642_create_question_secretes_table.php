<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionSecretesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_secretes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question')->unique();
        });
        Schema::table('recovers', function (Blueprint $table){
            $table->integer('question_secrete_id')->unsigned()->index()->nullable();
            $table->string('response')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_secretes');
    }
}

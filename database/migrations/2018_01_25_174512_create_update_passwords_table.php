<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatePasswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('update_passwords', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recover_id')->unsigned()->index()->unique();
            $table->boolean('last_password')->nullable();
            $table->boolean('sq')->nullable();
            $table->string('token');
            $table->string('code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('update_passwords');
    }
}

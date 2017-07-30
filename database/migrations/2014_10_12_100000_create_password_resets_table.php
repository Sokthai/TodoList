<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('email')->index();
            $table->string('token')->uniuqe()->nullable();
            $table->string('firstQuestion');
            $table->string('firstAnswer');
            $table->string('secondQuestion');
            $table->string('secondAnswer');
            $table->string('thirdQuestion');
            $table->string('thirdAnswer');
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
        Schema::dropIfExists('password_resets');
    }
}

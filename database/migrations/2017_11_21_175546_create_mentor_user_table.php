<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentorUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->unique();
            $table->integer('mentor_id')->unsigned();
        });

        Schema::table('mentor_user', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('mentor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentors');
    }
}

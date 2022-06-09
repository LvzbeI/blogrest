<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

        //create models
     // php artisan make:migration create_topics_table


     //php artisan migrate    -- create tables
     //php artisan migrate:fresh    -- delete all tables and create them again
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('user', 20)->primary();
            $table->string('pass');
            $table->string('nombre');
            $table->char('rol', 1);
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
        Schema::dropIfExists('users');
    }
}

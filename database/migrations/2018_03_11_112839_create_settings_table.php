<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('book_list')->nullable();
            $table->integer('book_list_quantity')->nullable();
            $table->string('movie_list')->nullable();
            $table->integer('movie_list_quantity')->nullable();
            $table->string('event_list')->nullable();
            $table->integer('event_list_quantity')->nullable();
            $table->string('show_tutorial')->nullable();
            $table->string('subscription_plan')->nullable();
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
        Schema::dropIfExists('settings');
    }
}

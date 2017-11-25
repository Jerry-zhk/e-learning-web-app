<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('event', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_type');
            $table->string('model_type')->nullable();
            $table->integer('model_id')->unsigned()->default(0);
            $table->integer('user_id')->unsigned();
            $table->string('description')->nullable();
            $table->timestamp('created_at');

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}

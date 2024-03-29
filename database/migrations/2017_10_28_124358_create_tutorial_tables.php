<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
         Schema::create('skill', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('display_name');
            $table->string('type');
            $table->integer('tutorials_count')->unsigned()->default(0);
        });

        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->float('price');
            $table->string('description')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::create('skill_series', function (Blueprint $table) {
            $table->integer('skill_id')->unsigned();
            $table->integer('series_id')->unsigned();

            $table->foreign('skill_id')->references('id')->on('skill')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('series_id')->references('id')->on('series')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('tutorial', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->integer('series_id')->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('series_id')->references('id')->on('series')
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
        Schema::dropIfExists('skill_series');
        Schema::dropIfExists('series_follow');
        Schema::dropIfExists('tutorial');
        Schema::dropIfExists('series');
        Schema::dropIfExists('skill');
    }
}

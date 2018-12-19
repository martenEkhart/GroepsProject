<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customisations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image_name');
            $table->integer('x');
            $table->integer('y');
            $table->integer('width');
            $table->integer('height');
            $table->integer('rotation');
            $table->integer('z_layer');
            $table->integer('opacity');
            $table->boolean('visible');
            $table->boolean('watermark_style');
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
        Schema::dropIfExists('customisations');
    }
}

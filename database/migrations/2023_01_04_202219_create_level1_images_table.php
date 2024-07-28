<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevel1ImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level1_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('level1_id');
            $table->foreign('level1_id')->references('id')->on('level1')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->mediumText('underImage')->nullable();
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
        Schema::dropIfExists('level1_images');
    }
}

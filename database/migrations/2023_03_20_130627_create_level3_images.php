<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevel3Images extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level3_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('level3_id');
            $table->foreign('level3_id')->references('id')->on('level3')->onDelete('cascade');
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
        Schema::dropIfExists('level3_images');
    }
}

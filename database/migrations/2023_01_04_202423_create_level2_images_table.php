<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevel2ImagesTable extends Migration
{
    /**
     * Run the migrations.
     * php artisan make:migration create_unit_images_table
     *
     * Hadi
     * @return void
     */
    public function up()
    {
        Schema::create('level2_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('level2_id');
            $table->foreign('level2_id')->references('id')->on('level2')->onDelete('cascade');
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
        Schema::dropIfExists('level2_images');
    }
}

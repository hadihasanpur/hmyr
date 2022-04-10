<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');
            $table->string('image');
            $table->string('alt');
            $table->string('image1');
            $table->string('alt1');
            $table->string('image2');
            $table->string('alt2');
            $table->string('image3');
            $table->string('alt3');
            $table->string('image4');
            $table->string('alt4');
            $table->string('image5');
            $table->string('alt5');
            $table->string('image6');
            $table->string('alt6');
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('posts');
    }
}

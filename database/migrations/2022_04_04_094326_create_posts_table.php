<<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use phpDocumentor\Reflection\Types\Nullable;

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
            $table->string('img1');
            $table->string('alt1')->nullable();
            $table->string('img2')->nullable();
            $table->string('alt2')->nullable();
            $table->string('img3')->nullable();
            $table->string('alt3')->nullable();
            $table->string('img4')->nullable();
            $table->string('alt4')->nullable();
            $table->string('img5')->nullable();
            $table->string('alt5')->nullable();
            $table->string('img6')->nullable();
            $table->string('alt6')->nullable();
            $table->string('img7')->nullable();
            $table->string('alt7')->nullable();
            $table->string('img8')->nullable();
            $table->string('alt8')->nullable();
            $table->string('img9')->nullable();
            $table->string('alt9')->nullable();
            $table->string('img10')->nullable();
            $table->string('alt10')->nullable();
            $table->string('img11')->nullable();
            $table->string('alt11')->nullable();
            $table->string('img12')->nullable();
            $table->string('alt12')->nullable();
            $table->string('img13')->nullable();
            $table->string('alt13')->nullable(); 
            $table->string('img14')->nullable();
            $table->string('alt14')->nullable(); 
            $table->string('img15')->nullable();
            $table->string('alt15')->nullable(); 
            $table->string('img16')->nullable();
            $table->string('alt16')->nullable();
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
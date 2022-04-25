<?php

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
            $table->text('alt1')->nullable();
            $table->string('img2')->nullable();
            $table->text('alt2')->nullable();
            $table->string('img3')->nullable();
            $table->text('alt3')->nullable();
            $table->string('img4')->nullable();
            $table->text('alt4')->nullable();
            $table->string('img5')->nullable();
            $table->text('alt5')->nullable();
            $table->string('img6')->nullable();
            $table->text('alt6')->nullable();
            $table->string('img7')->nullable();
            $table->text('alt7')->nullable();
            $table->string('img8')->nullable();
            $table->text('alt8')->nullable();
            $table->string('img9')->nullable();
            $table->text('alt9')->nullable();
            $table->string('img10')->nullable();
            $table->text('alt10')->nullable();
            $table->string('img11')->nullable();
            $table->text('alt11')->nullable();
            $table->string('img12')->nullable();
            $table->text('alt12')->nullable();
            $table->string('img13')->nullable();
            $table->text('alt13')->nullable(); 
            $table->string('img14')->nullable();
            $table->text('alt14')->nullable(); 
            $table->string('img15')->nullable();
            $table->text('alt15')->nullable(); 
            $table->string('img16')->nullable();
            $table->text('alt16')->nullable();
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

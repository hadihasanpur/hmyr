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
            $table->string('img1');
            $table->string('alt1');
            $table->string('img2');
            $table->string('alt2');
            $table->string('img3');
            $table->string('alt3');
            $table->string('img4');
            $table->string('alt4');
            $table->string('img5');
            $table->string('alt5');
            $table->string('img6');
            $table->string('alt6');
            $table->string('img7');
            $table->string('alt7');
            $table->string('img8');
            $table->string('alt8');
            $table->string('img9');
            $table->string('alt9');
            $table->string('img10');
            $table->string('alt10');
            $table->string('img11');
            $table->string('alt11');
            $table->string('img12');
            $table->string('alt12');
            $table->string('img13');
            $table->string('alt13'); 
            $table->string('img14');
            $table->string('alt14'); 
            $table->string('img15');
            $table->string('alt15'); 
            $table->string('img16');
            $table->string('alt16');
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->created_at();
            $table->updated_at();
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

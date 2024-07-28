<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('level1_id');
            $table->foreign('level1_id')->references('id')->on('level1')->onDelete('cascade');
            $table->foreignId('level2_id');
            $table->foreign('level2_id')->references('id')->on('level2')->onDelete('cascade');
            $table->foreignId('level3_id');
            $table->foreign('level3_id')->references('id')->on('level3')->onDelete('cascade');
            $table->string('name');
            $table->string('title');
            $table->string('avatar')->comment('تصویر');
            $table->string('post')->comment('عنوان شغلی');
            $table->string('ad')->nullable()->comment('تحصیلات');
            $table->char('mobile', 15)->nullable()->comment('موبایل');
            $table->string('email')->nullable()->comment('ایمیل');
            $table->string('description')->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('started_at');
            $table->string('finished_at');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('modirs');
    }
}

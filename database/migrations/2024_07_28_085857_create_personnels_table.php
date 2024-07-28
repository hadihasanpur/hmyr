<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('level1_id');
            $table->foreign('level1_id')->references('id')->on('level1')->onDelete('cascade');
            $table->foreignId('level2_id');
            $table->foreign('level2_id')->references('id')->on('level2')->onDelete('cascade');
            $table->foreignId('level3_id');
            $table->foreign('level3_id')->references('id')->on('level3')->onDelete('cascade');
            $table->string('name', 100)->comment('نام');
            $table->string('post', 80)->comment('عنوان شغلی');
            $table->string('unit', 100)->comment('نام واحد مربوطه');
            $table->char('avatar', 100)->comment('تصویر');
            $table->char('ad', 100)->comment('تحصیلات');
            $table->text('description', 100)->comment('توضیحات');
            $table->date('started_at')->comment('شروع بکار');
            $table->date('finished_at')->comment('شروع بکار');
            $table->unsignedTinyInteger('priority')->comment('ترتیب منو');
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('personnels');
    }
}

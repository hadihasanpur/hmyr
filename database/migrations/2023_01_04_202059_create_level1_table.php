<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevel1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * php artisan make:migration create_level1_table
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name')->comment('نام واحد سطح ۱ ');
            $table->mediumText('description')->nullable()->comment('توضیحات');
            $table->char('tel1', 18)->nullable()->comment('تلفن مستقیم');
            $table->char('tel2', 18)->nullable()->comment('تلفن مستقیم');
            $table->char('tel3', 18)->nullable()->comment('تلفن داخلی');
            $table->char('fax', 10)->nullable()->comment('فکس');
            $table->string('email')->nullable()->comment('ایمیل');
            $table->string('address')->nullable()->comment('آدرس واحد');
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
        Schema::dropIfExists('level1');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevel2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level2', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('level1_id');
            $table->foreign('level1_id')->references('id')->on('level1')->onDelete('cascade');
            $table->string('name')->comment(' نام واحد سطح 3');
            $table->mediumText('description')->nullable()->comment('توضیحات');
            $table->char('tel1', 15)->nullable()->comment('تلفن مستقیم');
            $table->char('tel2', 4)->nullable()->comment('تلفن داخلی');
            $table->char('fax', 10)->nullable()->comment('فکس');
            $table->string('email')->nullable()->comment('ایمیل');
            $table->string('address')->nullable()->comment('آدرس واحد');
            $table->unsignedTinyInteger('priority')->comment('ترتیب منو');
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
        Schema::dropIfExists('level2');
    }
}

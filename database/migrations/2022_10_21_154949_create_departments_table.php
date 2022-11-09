<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->mediumText('description');
            $table->string('manager');
            $table->string('ad');//academic degree
            $table->string('post');
            $table->string('avatar');
            $table->char('tel1', 15);//04433482331
            $table->char('tel2', 10)->nullable();
            $table->char('mobile', 10)->nullable();
            $table->char('fax', 10)->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('departments');
    }
}

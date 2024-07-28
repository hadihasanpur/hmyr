<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
             $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('project')->comment('نام پروژه');
            $table->string('employer')->comment('کارفرما ');
            $table->string('consultant')->comment('مشاور');
            $table->string('location')->comment('محل اجرا');
            $table->bigInteger('cost')->comment('هزینه اجرا');
            $table->year('start')->comment('شروع');
            $table->year('end')->comment('پایان');
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
        Schema::dropIfExists('projects');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('av_solutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description');
            $table->longText('list')->default(null);
            $table->string('cover_image');
            $table->string('main_image');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->string('image_4');
            $table->string('created_by')->default('null');
            $table->string('updated_by')->default('null');
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
        Schema::dropIfExists('av_solutions');
    }
}

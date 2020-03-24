<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElvProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elv_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_name');
            $table->string('solution_name');
            $table->string('company_name');
            $table->string('city')->default(null);
            $table->string('awarded_month')->default(null);
            $table->string('awarded_year')->default(null);
            $table->longText('description')->default(null);
            $table->string('cover_image')->default(null);
            $table->longText('project_images')->default(null);
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
        Schema::dropIfExists('elv_projects');
    }
}

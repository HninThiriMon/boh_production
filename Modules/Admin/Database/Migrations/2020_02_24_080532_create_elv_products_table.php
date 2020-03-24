<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElvProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elv_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('solution_name');
            $table->string('product_name');
            $table->string('brand_name');
            $table->integer('price');
            $table->longText('specification')->default(null);
            $table->longText('product_images')->default(null);
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
        Schema::dropIfExists('elv_products');
    }
}

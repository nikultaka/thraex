<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_products', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('subproduct_name')->nullable();
            $table->string('product_id')->nullable();
            $table->tinyInteger('status')->default(1)->comment("0=deleted,1=active");
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_products');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->uuid('product_code');
            $table->string('shipping_code')->nullable();
            $table->text('description')->nullable();
            $table->float('price', 8, 2)->default(0);
            $table->date('batch');
            $table->integer('quantity')->default(0);
            $table->integer('category')->default(0);
            $table->decimal('picture_path', $precision = 8, $scale = 2)->nullable();
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
        Schema::dropIfExists('products');
    }
}

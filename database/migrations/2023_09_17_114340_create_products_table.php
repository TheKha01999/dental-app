<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            // $table->float('discount_price')->default(0);
            // $table->string('shipping', 255)->nullable();
            // $table->float('weight')->default(0);
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->float('price')->default(0);
            $table->text('short_description')->nullable();
            $table->integer('qty')->default(0);
            $table->text('description')->nullable();
            $table->text('information')->nullable();
            $table->string('image', 255)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->unsignedBigInteger('product_categories_id');

            $table->foreign('product_categories_id')->references('id')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

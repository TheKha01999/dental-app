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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('biography')->nullable();
            $table->string('image', 255)->nullable();
            $table->boolean('status')->default(1);

            $table->unsignedBigInteger('service_categories_id');
            $table->foreign('service_categories_id')->references('id')->on('service_categories');

            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branchs');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};

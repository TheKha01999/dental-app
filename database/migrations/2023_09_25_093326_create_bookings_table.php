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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->string('date', 255)->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branchs');

            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('service_categories');

            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');

            $table->string('time_code');
            $table->foreign('time_code')->references('code')->on('booking_times');

            $table->string('status_code');
            $table->foreign('status_code')->references('code')->on('booking_status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

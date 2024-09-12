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
            $table->uuid('id')->primary();
            
            $table->uuid('user_id')->nullable(); 
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->uuid('trip_id')->nullable(); 
            $table->foreign('trip_id')->references('id')->on('trips')->nullOnDelete();
            $table->uuid('seat_id')->nullable(); 
            $table->foreign('seat_id')->references('id')->on('seats')->nullOnDelete();


            $table->enum('status', ['pending', 'paid', 'cancelled'])->nullable();
            $table->uuid('added_by')->nullable(); 
            $table->foreign('added_by')->references('id')->on('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
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

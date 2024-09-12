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
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('booking_id')->nullable(); 
            $table->foreign('booking_id')->references('id')->on('bookings')->nullOnDelete();

            $table->string('transaction_reference')->unique()->nullable();
            $table->enum('status', ['pending', 'completed', 'failed'])->nullable();
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
        Schema::dropIfExists('payments');
    }
};

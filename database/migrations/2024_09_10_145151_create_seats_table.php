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
        Schema::create('seats', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('trip_id')->nullable(); 
            $table->foreign('trip_id')->references('id')->on('trips')->nullOnDelete();

            $table->string('seat_number')->nullable();
            $table->boolean('is_available')->default(true)->nullable();
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
        Schema::dropIfExists('seats');
    }
};

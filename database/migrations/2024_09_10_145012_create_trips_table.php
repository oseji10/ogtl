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
        Schema::create('trips', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('origin_city_id')->nullable(); 
            $table->foreign('origin_city_id')->references('id')->on('cities')->nullOnDelete();
            $table->uuid('destination_city_id')->nullable(); 
            $table->foreign('destination_city_id')->references('id')->on('cities')->nullOnDelete();
            $table->date('travel_date')->nullable();
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
        Schema::dropIfExists('trips');
    }
};

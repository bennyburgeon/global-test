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
        Schema::create('candidate_location', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('location_id')->unsigned()->references('id')->on('cities')->nullable(); 
            $table->integer('candidate_id')->unsigned()->references('id')->on('candidates')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_location');
    }
};

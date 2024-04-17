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
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->integer('experience')->nullable();
            $table->string('password')->nullable();
            $table->integer('notice_period')->nullable();
            $table->string('resume')->nullable();
            $table->string('photo')->nullable();
            $table->integer('status')->default(1);
            $table->date('verified_at')->nullable();
            $table->integer('verified_by')->unsigned()->references('id')->on('users')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};

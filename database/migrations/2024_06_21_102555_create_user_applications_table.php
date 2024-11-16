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
        Schema::create('user_applications', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(table: 'users')->nullable()->onDelete('cascade');
            $table->foreignId('internship_id')->constrained(table: 'internships')->nullable()->onDelete('cascade');
            $table->integer('status')->comment('0: pending, 1: accepted, 2: rejected')->nullable()->default(0);

            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_applications');
    }
};

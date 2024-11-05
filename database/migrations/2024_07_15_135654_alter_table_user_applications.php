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
        Schema::table('user_applications', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained(table: 'users')->nullable()->onDelete('cascade');
            $table->foreignId('internship_id')->constrained(table: 'internships')->nullable()->onDelete('cascade');
            $table->integer('status')->comment('0: pending, 1: accepted, 2: rejected')->nullable()->default(0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('internship_id');
            $table->dropColumn('status');
        });
    }
};

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
        Schema::create('user_informations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('student_id')->nullable();
            $table->decimal('cgpa', 3, 2)->nullable();
            $table->integer('year_of_study')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('city')->nullable();
            $table->string('university')->nullable();
            $table->string('department')->nullable();
            $table->string('degree')->nullable();
            $table->text('about_me')->nullable();
            $table->string('application_letter_file_path')->nullable();
            $table->string('application_acceptance_file_path')->nullable();
            $table->string('student_id_file_path')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_informations');
    }
};

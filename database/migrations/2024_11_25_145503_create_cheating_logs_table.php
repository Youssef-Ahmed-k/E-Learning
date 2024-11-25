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
        Schema::create('cheating_logs', function (Blueprint $table) {
            $table->id('LogID');
            $table->enum('SuspiciousBehavior', ['eye_movement', 'multiple_people', 'object_detection', 'other'])->nullable();
            $table->boolean('IsReviewed')->default(false);
            $table->foreignId('StudentID')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('QuizID')->constrained('quizzes', 'QuizID')->onDelete('cascade');
            $table->timestamp('DetectedAt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheating_logs');
    }
};

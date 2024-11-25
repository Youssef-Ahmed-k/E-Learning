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
        Schema::create('student_answers', function (Blueprint $table) {
            $table->id('StudentAnswerID');
            $table->foreignId('StudentID')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('QuestionID')->constrained('questions', 'QuestionID')->onDelete('cascade');
            $table->foreignId('SelectedAnswerID')->nullable()->constrained('answers', 'AnswerID')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_answers');
    }
};
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
        Schema::create('questions', function (Blueprint $table) {
            $table->id('QuestionID');
            $table->text('Content');
            $table->enum('Type', ['mcq', 'short_answer', 'true_false'])->default('mcq'); // Question type
            $table->integer('Marks');
            $table->string('image')->nullable();
            $table->foreignId('QuizID')
            ->constrained('quizzes', 'QuizID')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
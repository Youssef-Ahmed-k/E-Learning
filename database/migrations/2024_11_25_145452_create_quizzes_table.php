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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id('QuizID');
            $table->string('Title');
            $table->text('Description')->nullable();
            $table->integer('Duration');
            $table->timestamp('StartTime')->nullable();
            $table->timestamp('EndTime')->nullable();
            $table->date('QuizDate');
            $table->boolean('LockdownEnabled')->default(false);
            $table->foreignId('CourseID')->constrained('courses', 'CourseID')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
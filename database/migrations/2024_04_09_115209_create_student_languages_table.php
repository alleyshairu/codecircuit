<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_languages', function (Blueprint $table) {
            $table->uuid('student_id');
            $table->unsignedInteger('language_id');
            $table->timestamps();

            $table->unique(['language_id', 'student_id']);
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('student_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_languages');
    }
};

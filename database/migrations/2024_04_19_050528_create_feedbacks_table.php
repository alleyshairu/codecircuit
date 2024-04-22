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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->uuid('feedback_id')->index();
            $table->uuid('problem_id');
            $table->uuid('student_id');
            $table->text('feedback');
            $table->unsignedTinyInteger('score');
            $table->boolean('gained_new_knowledge');
            $table->boolean('is_interesting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};

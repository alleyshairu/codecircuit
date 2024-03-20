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
        Schema::create('problems', function (Blueprint $table) {
            $table->uuid('problem_id')->unique();
            $table->string('title');
            $table->text('description');
            $table->text('output')->nullable();
            $table->uuid('chapter_id');
            $table->timestamps();

            $table->foreign('chapter_id')->references('chapter_id')->on('chapters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problems');
    }
};

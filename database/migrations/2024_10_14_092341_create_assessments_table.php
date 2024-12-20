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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('intelligence_id')->nullable();
            $table->unsignedBigInteger('personality_id')->nullable();
            $table->string('name');
            $table->date('birth_date');
            $table->string('hobby');
            $table->json('mis_results')->nullable();
            $table->json('riasec_results')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users');

            $table->foreign('intelligence_id')
            ->references('id')
            ->on('results');

            $table->foreign('personality_id')
            ->references('id')
            ->on('results');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};

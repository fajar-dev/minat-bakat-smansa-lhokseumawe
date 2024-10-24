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
        Schema::create('recomendeds', function (Blueprint $table) {
            $table->unsignedBigInteger('result_id');
            $table->unsignedBigInteger('organization_id');

            $table->foreign('result_id')
            ->references('id')
            ->on('results')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreign('organization_id')
            ->references('id')
            ->on('organizations')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recomendeds');
    }
};

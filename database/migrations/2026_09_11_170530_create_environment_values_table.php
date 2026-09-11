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
        Schema::create('environment_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('environment_id')->constrained('environments')->cascadeOnDelete();
            $table->string('key');
            $table->text('value');
            $table->boolean('gap_after')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('environment_values');
    }
};

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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('category'); // 'Darurat', 'Mendesak', 'Normal'
            $table->decimal('target_amount', 15, 2);
            $table->decimal('collected_amount', 15, 2)->default(0);
            $table->string('impact_formula'); // Contoh: "100000 = 3 Paket Makanan"
            $table->date('deadline');
            $table->boolean('is_active')->default(true);
            $table->string('thumbnail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};

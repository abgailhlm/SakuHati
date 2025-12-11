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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('donor_name');
            $table->string('donor_email');
            $table->string('tracking_code')->unique(); // KUNCI FITUR TRACKING
            $table->decimal('amount', 15, 2);
            $table->string('status')->default('pending'); // pending, verified, distributed
            $table->text('distribution_proof')->nullable(); // Foto bukti
            $table->date('distributed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};

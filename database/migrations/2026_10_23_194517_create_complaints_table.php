<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_code')->unique(); // FCMS-2026-001
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('category'); // Academic, Hostel, Canteen, etc - 9 categories
            $table->string('sub_category')->nullable();
            $table->text('description');
            $table->string('file_path')->nullable(); // JPG/PNG/PDF 5MB
            $table->boolean('is_anonymous')->default(false); // 95% female demand
            $table->enum('status', ['pending', 'in-progress', 'resolved', 'rejected'])->default('pending');
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null'); // Coordinator
            $table->timestamp('escalated_at')->nullable(); // 72h auto-escalation to HOD
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
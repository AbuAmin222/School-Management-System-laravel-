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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('specialization');
            $table->date('date_of_birth');
            $table->date('hire_date');
            $table->enum('qualification', ['diploma', 'bachelors', 'master', 'doctora']);
            $table->enum('gender', ['male', 'female', 'other']);
            $table->enum('permission', ['admin', 'user', 'student', 'teacher'])->deault('user');
            $table->enum('status', ['active', 'inactive'])->deault('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};

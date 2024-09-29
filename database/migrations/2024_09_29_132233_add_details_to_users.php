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
        Schema::table('users', function (Blueprint $table) {
            $table->string('usn')->nullable()->unique()->index();
            $table->enum('semester', ['1', '2', '3', '4', '5', '6', '7', '8'])->nullable();
            $table->enum('branch', ['CSE', 'ISE', 'ECE', 'MECH', 'CIVIL', 'ICB', 'AIDS', 'AIML'])->nullable()->index();
            $table->string('phone')->unique()->nullable();
            $table->enum('role', ['core_member', 'member', 'cordinator'])->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_alumini')->default(0);
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_verified')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::dropIfExists('users');
        });
    }
};

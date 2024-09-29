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
        Schema::create('event_registeraions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDeleteCascade();
            $table->foreignId('user_id')->constrained('users')->onDeleteCascade();
            $table->string('status')->default('pending');
            $table->boolean('attended')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_registeraions');
    }
};

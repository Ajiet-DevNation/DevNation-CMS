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
        Schema::create('certificate_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('template_name');
            $table->longText('template_image');
            $table->longText('description')->nullable();
            $table->float('description_font_size')->default(20);
            $table->float('description_x_axis')->default(360);
            $table->float('description_y_axis')->default(360);
            $table->float('description_angle')->default(0);
            $table->float('unique_id_font_size')->default(20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_templates');
    }
};

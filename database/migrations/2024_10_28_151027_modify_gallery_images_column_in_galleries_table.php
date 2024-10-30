<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyGalleryImagesColumnInGalleriesTable extends Migration
{
    public function up()
    {
        Schema::table('galleries', function (Blueprint $table) {
            // Zmena typu stĺpca späť na TEXT
            $table->text('gallery_images')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('galleries', function (Blueprint $table) {
            // Návrat na pôvodný typ, ak bolo nastavené inak
            $table->text('gallery_images')->nullable()->change();
        });
    }
}



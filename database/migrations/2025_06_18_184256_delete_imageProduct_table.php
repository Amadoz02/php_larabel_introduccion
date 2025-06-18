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
        Schema::table('products', function (Blueprint $table) {
            // Primero elimina la foreign key si existe
            if (Schema::hasColumn('products', 'image_id')) {
                $table->dropForeign(['image_id']);
                $table->dropColumn('image_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'image_id')) {
                $table->unsignedBigInteger('image_id')->nullable();
                $table->foreign('image_id')->references('id')->on('images');
            }
        });
    }
};

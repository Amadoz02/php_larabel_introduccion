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
        Schema::table('images', function (Blueprint $table) {
            //hacer el imageable_id y imageable_type nullable
            $table->unsignedBigInteger('imageable_id')->nullable()->after('id');
            $table->string('imageable_type')->nullable()->after('imageable_id');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            //eliminar los campos imageable_id y imageable_type
            $table->dropColumn(['imageable_id', 'imageable_type']); 
        });
    }
};

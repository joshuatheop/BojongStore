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
            $table->string('weight')->nullable();
            $table->string('type')->nullable();
            $table->string('packaging')->nullable();
            $table->string('shelf_life')->nullable();
            $table->string('production')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['weight', 'type', 'packaging', 'shelf_life', 'production']);
        });
    }
};

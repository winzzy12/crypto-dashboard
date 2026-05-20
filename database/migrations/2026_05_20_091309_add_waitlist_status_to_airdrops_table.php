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
        Schema::table('airdrops', function (Blueprint $table) {
            // Modify status column to include 'waitlist'
            $table->string('status')->default('daily')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airdrops', function (Blueprint $table) {
            //
        });
    }
};

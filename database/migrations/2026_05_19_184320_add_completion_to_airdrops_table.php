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
            $table->boolean('is_completed')->default(false)->after('notes');
            $table->decimal('earnings', 10, 2)->nullable()->after('is_completed');
            $table->dateTime('start_date')->nullable()->after('earnings');
            $table->dateTime('end_date')->nullable()->after('start_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airdrops', function (Blueprint $table) {
            $table->dropColumn(['is_completed', 'earnings', 'start_date', 'end_date']);
        });
    }
};

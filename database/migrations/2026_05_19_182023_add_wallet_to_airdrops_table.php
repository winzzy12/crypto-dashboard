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
            $table->string('wallet_address')->nullable()->after('telegram_link');
            $table->text('private_key')->nullable()->after('wallet_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airdrops', function (Blueprint $table) {
            $table->dropColumn(['wallet_address', 'private_key']);
        });
    }
};

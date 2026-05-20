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
            $table->string('discord_link')->nullable()->after('task_type');
            $table->string('twitter_link')->nullable()->after('discord_link');
            $table->string('telegram_link')->nullable()->after('twitter_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airdrops', function (Blueprint $table) {
            $table->dropColumn(['discord_link', 'twitter_link', 'telegram_link']);
        });
    }
};

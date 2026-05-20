<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airdrop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'chain',
        'task_type',
        'discord_link',
        'twitter_link',
        'telegram_link',
        'wallet_address',
        'private_key',
        'notes',
        'is_completed',
        'earnings',
        'start_date',
        'end_date',
        'logo',
        'description',
        'status',
    ];

    public function dailyChecklists()
    {
        return $this->hasMany(DailyChecklist::class);
    }
}

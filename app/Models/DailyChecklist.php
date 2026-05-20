<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class DailyChecklist extends Model
{
    protected $fillable = [
        'user_id',
        'airdrop_id',
        'is_completed',
        'completed_at',
        'reset_at',
    ];

    protected $casts = [
        'is_completed' => 'boolean',
        'completed_at' => 'datetime',
        'reset_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the checklist
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the airdrop that owns the checklist
     */
    public function airdrop(): BelongsTo
    {
        return $this->belongsTo(Airdrop::class);
    }

    /**
     * Check if checklist needs reset (24 hours passed)
     */
    public function needsReset(): bool
    {
        if (!$this->is_completed || !$this->completed_at) {
            return false;
        }

        return $this->completed_at->addHours(24)->isPast();
    }

    /**
     * Reset the checklist
     */
    public function reset(): void
    {
        $this->update([
            'is_completed' => false,
            'completed_at' => null,
            'reset_at' => now(),
        ]);
    }

    /**
     * Mark as completed
     */
    public function markCompleted(): void
    {
        $this->update([
            'is_completed' => true,
            'completed_at' => now(),
        ]);
    }

    /**
     * Get or create today's checklist for user and airdrop
     */
    public static function getTodayChecklist($userId, $airdropId)
    {
        $today = Carbon::now()->startOfDay();
        
        $checklist = self::where('user_id', $userId)
            ->where('airdrop_id', $airdropId)
            ->whereDate('created_at', $today)
            ->first();

        if (!$checklist) {
            $checklist = self::create([
                'user_id' => $userId,
                'airdrop_id' => $airdropId,
                'is_completed' => false,
            ]);
        }

        // Auto-reset if 24 hours passed
        if ($checklist->needsReset()) {
            $checklist->reset();
        }

        return $checklist;
    }
}

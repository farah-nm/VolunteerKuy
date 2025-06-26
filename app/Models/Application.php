<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    /**
     * Field yang boleh diisi massal.
     */
    protected $fillable = [
        'volunteer_activity_id',
        'participant_profile_id',
        'status',
        // 'motivation',
    ];

    protected $casts = [
        'application_date' => 'date', // Atau 'date' jika hanya tanggal
    ];

    /**
     * Relasi ke volunteer activity.
     */
    public function volunteerActivity(): BelongsTo
    {
        return $this->belongsTo(VolunteerActivity::class);
    }

    /**
     * Relasi ke user (jika masih dipakai).
     */
    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }

    // ditambahin el
    public function participantProfile()
    {
        return $this->belongsTo(ParticipantProfile::class);
    }
}

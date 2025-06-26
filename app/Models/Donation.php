<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    use HasFactory;

    // ini ditambahin el
    /**
     * Kolom yang boleh diisi secara massal.
     */
    protected $fillable = [
    'participant_profile_id',
    'organization_profile_id', // ⬅️ INI WAJIB
    'volunteer_activity_id',
    'amount',
    'payment_method',
    'proof_path',
    'status',
    'notes',
    'donation_date'
    ];


    /**
     * Relasi ke profil partisipan (bukan langsung ke user).
     */
    public function participantProfile(): BelongsTo
    {
        return $this->belongsTo(ParticipantProfile::class);
    }


    /**
     * Relasi ke organisasi tujuan.
     */
    public function organizationProfile(): BelongsTo
    {
        return $this->belongsTo(OrganizationProfile::class);
    }
// sampai sini

    /**
     * Get the volunteer activity that this donation belongs to.
     */
    public function volunteerActivity(): BelongsTo
    {
        return $this->belongsTo(VolunteerActivity::class, 'volunteer_activity_id');
    }

    // /**
    //  * Get the user who made the donation.
    //  */
    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }

}

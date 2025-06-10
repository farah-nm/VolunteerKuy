<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class OrganizationProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // Tambahkan baris ini
        'name',
        'description',
        'address',
        'city',
        'province',
        'postal_code',
        'phone_number',
        'website_url',
        'logo_path',
        'verification_status',
        'verified_by',
        'verified_at',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // /**
    //  * Get all of the volunteer activities for the organization.
    //  */
    // public function volunteerActivities(): HasMany
    // {
    //     return $this->hasMany(VolunteerActivity::class);
    // }

    // /**
    //  * Get the user that verified the organization profile.
    //  */
    // public function verifier(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'verified_by');
    // }
}

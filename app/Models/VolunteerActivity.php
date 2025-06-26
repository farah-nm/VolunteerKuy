<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VolunteerActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_profile_id',
        'title',
        'description',
        'location_address',
        'start_date',
        'end_date',
        'slots_available',
        'status',
        'contact_email',
        'contact_phone',
        'banner_image_path',
        'location_city',
        'location_province',
        'registration_deadline',
        'requirements',
    ];


    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'registration_deadline' => 'datetime',
    ];

    /* ---------- RELATIONS ---------- */
    public function organizationProfile(): BelongsTo
    {
        return $this->belongsTo(OrganizationProfile::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function volunteerRegistrations(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }
}

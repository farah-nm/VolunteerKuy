<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Event;
use App\Models\VolunteerActivity;

class OrganizationProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'address',
        'city',
        'province',
        'postal_code',
        'phone_number',
        'website_url',
        'logo_path',
        'status',
        'verified_by',
        'verified_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // // ✅ Relasi benar: Event dimiliki oleh Organization
    // public function events(): HasMany
    // {
    //     return $this->hasMany(Event::class);
    // }

    // ✅ Relasi untuk aktivitas volunteer (kegiatan spesifik dalam event)
    public function volunteerActivities(): HasMany
    {
        return $this->hasMany(VolunteerActivity::class);
    }

    // public function verifier(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'verified_by');
    // }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function events(): HasMany
    {
        return $this->hasMany(VolunteerActivity::class);
    }

    // Jika kamu ingin aktifkan nanti, kamu bisa pakai ini:
    // public function verifier(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'verified_by');
    // }
}

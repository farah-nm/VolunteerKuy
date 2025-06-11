<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\OrganizationProfile;

class VolunteerActivity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'organization_profile_id',
        'title', // Tambahkan baris ini
        'description',
        'location_address',
        'start_date',
        'end_date',
        'slots_available',
        'status',
        'contact_email',
        'contact_phone',
        'banner_image_path', // Tambahkan baris ini jika Anda ingin mengizinkan upload gambar
        'location_city',
        'location_province',
        'registration_deadline',

        // tambahkan kolom lain yang ingin Anda izinkan untuk mass assignment
    ];

    /**
     * Get the organization profile that owns the volunteer activity.
     */
    public function organizationProfile(): BelongsTo
    {
        return $this->belongsTo(OrganizationProfile::class);
    }

    /**
     * Get all of the volunteer registrations for the activity.
     */
    public function volunteerRegistrations(): HasMany
{
    return $this->hasMany(Application::class);
}
}

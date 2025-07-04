<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
/**
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Event[] $events
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($user) {
            if ($user->isDirty('status') && $user->status === 'suspended' && $user->role === 'organization') {
                if ($user->organizationProfile) {
                    $user->organizationProfile->update(['status' => 'suspended']);
                }
            } elseif ($user->isDirty('status') && $user->status !== 'suspended' && $user->role === 'organization') {
                if ($user->organizationProfile && $user->organizationProfile->status === 'suspended') {
                    // Anda bisa menambahkan logika di sini jika ingin mengaktifkan kembali status di organization_profiles
                    // Misalnya: $user->organizationProfile->update(['status' => 'active']);
                }
            }
        });
    }

     public function organizationProfile()
    {
        return $this->hasOne(OrganizationProfile::class, 'user_id');
    }

    public function participantProfile()
    {
        return $this->hasOne(ParticipantProfile::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'organization_id');
    }


}

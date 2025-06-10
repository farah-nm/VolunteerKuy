<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ParticipantProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // Tambahkan baris ini
        'full_name',
        'date_of_birth',
        'gender',
        'phone_number',
        'address',
        'city',
        'province',
        'profile_picture_path',

        // tambahkan kolom lain yang ingin Anda izinkan untuk mass assignment
    ];

    /**
     * Get the user that owns the participant profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

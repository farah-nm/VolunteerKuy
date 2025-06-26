<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_profile_id', // Tambahkan baris ini
        'organization_profile_id',
        'title',
        'description',
        'status',
        'supporting_evidence', // Jika Anda menggunakannya untuk teks
        'supporting_evidence_path', // Jika Anda menggunakannya untuk path file
        // tambahkan kolom lain yang ingin Anda izinkan untuk mass assignment
    ];

    public function participantProfile(): BelongsTo
    {
        return $this->belongsTo(ParticipantProfile::class);
    }
    public function organizationProfile(): BelongsTo
    {
        return $this->belongsTo(OrganizationProfile::class);
    }
}

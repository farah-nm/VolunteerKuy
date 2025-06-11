<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    use HasFactory;

    // ... properti dan method lainnya ...

    /**
     * Get the event that this donation belongs to.
     */
    public function event(): BelongsTo
    {
        // Asumsi model event Anda bernama Event
        return $this->belongsTo(VolunteerActivity::class, 'volunteer_activity_id');

        // Jika model event Anda bernama VolunteerActivity, gunakan ini:
        // return $this->belongsTo(VolunteerActivity::class);
    }
}

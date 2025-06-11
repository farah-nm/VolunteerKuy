<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    // ... properti dan method lainnya ...

    /**
     * Get the volunteer activity that this application belongs to.
     */
    public function volunteerActivity(): BelongsTo
    {
        return $this->belongsTo(VolunteerActivity::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationReport extends Model
{
    protected $fillable = ['event_id', 'organization_id', 'file_path'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function organization()
    {
        return $this->belongsTo(User::class, 'organization_id');
    }
}

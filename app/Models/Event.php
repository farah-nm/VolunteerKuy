<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VolunteerApplication;
use App\Models\VolunteerActivity;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_profile_id',
        'title',
        'description',
        'location',
        'start_date',
        'end_date',
        'status',
        'banner_image',
        'region',
    ];

    public function volunteerApplications()
    {
        return $this->hasMany(VolunteerApplication::class);
    }

    public function volunteerActivities()
    {
        return $this->hasMany(VolunteerActivity::class);
    }
}

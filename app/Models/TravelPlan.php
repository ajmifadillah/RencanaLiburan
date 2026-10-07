<?php

namespace App\Models;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TravelPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'day',
        'time',
        'activity',
        'location',
        'description',
    ];

    protected $casts = [
        'time' => 'datetime:H:i',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
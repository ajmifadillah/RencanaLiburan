<?php

namespace App\Models;

use App\Models\User;
use App\Models\TravelPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'photo',
        'title',
        'departure_date',
        'budget',
        'duration',
        'status',
    ];

    protected $casts = [
        'departure_date' => 'date',
        'budget' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function travelPlans()
    {
        return $this->hasMany(TravelPlan::class);
    }
}
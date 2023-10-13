<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxes extends Model
{
    use HasFactory;

    protected $fillable = [
        'glev_id',
        'tx_code',
        'rate_per_hour',
        'tx_amount',
    ];

    public function gradelevels()
    {
        return $this->belongsTo(Gradelevel::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}

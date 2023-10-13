<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveAllow extends Model
{
    use HasFactory;

    protected $fillable = [
        'sch_id',
        'basic',
        'amount',
    ];

    public function schedules()
    {
        return $this->belongsTo(Schedule::class);
    }
}

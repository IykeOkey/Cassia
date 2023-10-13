<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalDeduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'duration',
        'ded_name',
        'ded_factor',
        'amount',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}

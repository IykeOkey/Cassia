<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'basic',
        'rent',
        'trans',
        'enter',
        'util',
        'meal',
        'overtime',
        'dom',
        'c',
        'ca',
        'sd',
        'harz',
        'j_allow',
        'rob_allow',
        'gross_pay',
        'ded',
        'tot_pay',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function ranks()
    {
        return $this->belongsTo(Rank::class);
    }
}

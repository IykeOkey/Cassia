<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchedSal extends Model
{
    use HasFactory;

    protected $fillable = [
        'basic',
        'rent',
        'trans',
        'enter',
        'util',
        'meal',
        'o_time',
        'dom',
        'conjus',
        'other_allow',
        'tax',
        'tot_ded',
        'gross_pay',
        'net_pay',
    ];
}

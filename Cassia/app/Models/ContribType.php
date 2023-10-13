<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContribType extends Model
{
    use HasFactory;

    protected $fillable = [
        'contrib_code',
        'contrib_name',
        'contrib_amount',
        'remarks'
    ];
}

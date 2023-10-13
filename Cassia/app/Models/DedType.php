<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DedType extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'ded_code',
        'ded_name'
    ];
}

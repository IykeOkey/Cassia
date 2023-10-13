<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GLStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'stp_code',
        'stp_name',
    ];
}

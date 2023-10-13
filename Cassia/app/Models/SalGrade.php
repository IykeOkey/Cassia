<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalGrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'grad_code',
        'grad_glev',
        'grad_step',
    ];
}

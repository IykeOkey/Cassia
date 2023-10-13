<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadre extends Model
{
    use HasFactory;

    protected $fillable = [
            'glev_id',
            'cdr_code',
            'cdr_name',
    ];

    public function gradelevels()
    {
        return $this->belongsTo(Gradelevel::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'rk_id',
        'stp_id',
        'glev_code',
        'glev_name',
    ];

    public function ranks()
    {
        return $this->belongsTo(Rank::class);
    }

    public function glsteps()
    {
        return $this->belongsTo(Glstep::class);
    }
}

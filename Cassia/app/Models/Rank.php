<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;

    protected $fillable = [
        'glev_id',
        'etype_id',
        'stp_id',
        'rk_code',
        'rk_name',
    ];

    public function gradelevels()
    {
        return $this->belongsTo(Gradelevel::class);
    }

    public function emptypes()
    {
        return $this->belongsTo(Emptype::class);
    }

    public function glsteps()
    {
        return $this->belongsTo(Glstep::class);
    }
}

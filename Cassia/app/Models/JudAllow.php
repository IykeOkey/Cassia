<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JudAllow extends Model
{
    use HasFactory;

    protected $fillable = [
        'grad_id',
        'factor',
        'multipler',
        'j_allow',
    ];

    public function salgrades()
    {
        return $this->belongsTo(Salgrade::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;

    protected $fillable = [
        'div_id',
        'ct_code',
        'ct_name',
    ];

    public function divisions()
    {
        return $this->belongsTo(Division::class);
    }
}

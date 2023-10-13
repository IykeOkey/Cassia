<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'st_id',
        'div_code',
        'div_name',
    ];

    public function division()
    {
        return $this->belongsTo(Station::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'media_data',
        'media_name',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'image_id',
        'edu_code',
        'edu_name',
        'edu_grade',
        'edu_date',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}

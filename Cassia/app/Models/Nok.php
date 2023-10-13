<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nok extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'nok_gender',
        'nok_name',
        'nok_relation',
        'nok_phone',
        'nok_email',
        'nok_address',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}

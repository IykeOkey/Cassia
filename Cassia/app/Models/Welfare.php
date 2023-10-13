<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Welfare extends Model
{
    use HasFactory;

    protected $fillable = [
        'welfare_code',
        'welfare_name',
        'welfare_amount',
        'remarks'
    ];

    public function nomrolls()
{
    return $this->hasOne(Nomroll::class, 'welfare_code');
}
}

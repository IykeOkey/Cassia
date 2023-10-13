<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deductn extends Model
{
    use HasFactory;

    protected $fillable = [
        'duty_disp',
        'o_time',
        'sp_duty'
    ];

    public function nomrolls()
{
    return $this->hasOne(Nomroll::class, 'common_column', 'common_column');
}
}

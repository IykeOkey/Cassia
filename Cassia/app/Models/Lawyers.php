<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyers extends Model
{
    protected $table = 'lawyers';
    use HasFactory;

    protected $fillable = [
        'duty_disp',
        'dom',
        'ca',
        'harz',
        'rob_allow'
    ];

    public function nomrolls()
{
    return $this->belongsToMany(Nomroll::class);
}
}

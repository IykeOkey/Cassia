<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;

    protected $fillable = [
        'sal_id',
        'basicpa',
        'basicpm',
        'rent',
        'trans',
        'meal',
        'util',
        'enter',
        'domestic'
    ];

 /*    public function gradelevels()
    {
        return $this->belongsTo(gradelevel::class);
    }

    public function nomrolls()
    {
        return $this->hasOne(Nomroll::class);
    }
   public function pays()
    {
        return $this->hasMany(Pay::class);
    }*/
}

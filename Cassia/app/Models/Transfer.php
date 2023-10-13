<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'div_id',
        'ct_id',
        'staff_id',
        'trf_code',
        'trf_name',
        'wefdate',
    ];

    public function divisions()
    {
        return $this->belongsTo(Division::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function courts()
    {
        return $this->belongsTo(Court::class);
    }
}

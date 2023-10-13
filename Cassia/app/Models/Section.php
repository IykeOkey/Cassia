<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'div_id',
        'sec_code',
        'sec_name'
    ];

    public function divisions()
    {
        return $this->belongsTo(Division::class);
    }
}

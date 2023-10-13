<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'banks';
    
    protected $fillable = [
        'bk_type',
        'bk_code',
        'sort_code',
        'bk_name',
        'branch',
    ];
}

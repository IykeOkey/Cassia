<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Due extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'emptype_id',
        'rate_param',
        'rate',
        'due_name',
        'amount',
    ];

    public function emptypes()
    {
        return $this->belongsTo(Emptype::class);
    }
}

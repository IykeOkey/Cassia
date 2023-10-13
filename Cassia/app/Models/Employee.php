<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_no',
        'file_no',
        'last_name',
        'middle_name',
        'first_name',
        'inc_mo',
        'fappo',
        'phone',
        'email',
        'birthdate',
        'marital_status',
        'media_id',
        'address',
        'country',
        'state',
        'lga',
        'town',
        'gender',
        'rk_id',
        'cad_id',
        'ct_id',
        'emp_status',
        'flag',
        'remark',
        'is_active',
    ];

    public function media()
    {
       // return $this->belongsTo(Media::class);
    }

    public function ranks()
    {
      //  return $this->belongsTo(Rank::class);
    }

    public function cadre()
    {
       // return $this->belongsTo(Cadre::class);
    }

    public function court()
    {
        return $this->belongsTo(Court::class);
    }
}

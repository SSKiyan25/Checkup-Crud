<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brgy extends Model
{
    use HasFactory;

    protected $table = 'brgys';

    protected $fillable = [
        'name',
        'city_id',
    ];

    // Functions to define the relationship with the City and Patients model
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function patients()
    {
        return $this->hasMany(Patient::class, 'brgy_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Function that defines the relationship with the Brgy model (many-to-one)
    public function brgys()
    {
        return $this->hasMany(Brgy::class, 'city_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Patient extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'brgy_id',
        'number',
        'email',
        'case_type',
        'coronavirus_status',
    ];

    // Function that defines the relationship with the Brgy model
    public function brgy()
    {
        return $this->belongsTo(Brgy::class, 'brgy_id');
    }
}
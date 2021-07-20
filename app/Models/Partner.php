<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Partner extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'business',
        'description',
        'address',
        'state',
    ];

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }

}

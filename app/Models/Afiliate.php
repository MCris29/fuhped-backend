<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Afiliate extends model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'address',
        'state',
    ];
}

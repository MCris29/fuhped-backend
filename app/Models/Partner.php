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
    public $timestamps = false;

    public function user()
    {
        return $this->morphOne('App\Models\User', 'userable');
    }
}

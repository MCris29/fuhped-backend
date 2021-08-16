<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    protected $fillable = [
        'title',
        'receiver_id',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($notification) {
            $notification->transmitter_id = Auth::id();
        });
    }

    public function transmitter()
    {
        return $this->belongsTo('App\Models\User', 'transmitter_id');
    }

    public function receiver()
    {
        return $this->belongsTo('App\Models\User', 'receiver_id');
    }
}

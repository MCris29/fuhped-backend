<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'price_fuhped'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($service) {
            $service->user_id = Auth::id();
        });
    }

    public function partner()
    {
        return $this->belongsTo('App\Models\User');
    }
}

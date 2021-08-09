<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Publication extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($publication) {
            $publication->user_id = Auth::id();
        });
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\User');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Appointment extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'state',
        'afiliate_id',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($appointment) {
            $appointment->partner_id = Auth::id();
        });
    }

    public function afiliate()
    {
        return $this->belongsTo('App\Models\User', 'afiliate_id');
    }

    public function partner()
    {
        return $this->belongsTo('App\Models\User', 'partner_id');
    }
}

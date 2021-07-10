<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'state',
    ];

    public function afiliate()
    {
        return $this->belongsTo('App\Models\Afiliate');
    }

    public function partner()
    {
        return $this->belongsTo('App\Models\Partner');
    }
}

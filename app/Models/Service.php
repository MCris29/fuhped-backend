<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'price_fuhped'
    ];

    public function partner()
    {
        return $this->belongsTo('App\Models\Partner');
    }
}

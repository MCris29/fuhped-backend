<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'title',
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function partner()
    {
        return $this->belongsTo('App\Models\Partner');
    }

    public function afiliate()
    {
        return $this->belongsTo('App\Models\Afiliate');
    }
}

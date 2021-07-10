<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image'
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}

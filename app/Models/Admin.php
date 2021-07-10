<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function publications()
    {
        return $this->hasMany('App\Models\Publication');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

}


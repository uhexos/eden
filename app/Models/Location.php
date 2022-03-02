<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public function country()
    {
        return $this->belongsToMany(Country::class);
    }
    public function gardeners()
    {
        return $this->hasMany(gardener::class);
    }
    public function customers()
    {
        return $this->hasMany(profile::class);
    }
}

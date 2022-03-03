<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gardener extends Model
{
    use HasFactory;
    public function location()
    {
        return $this->hasOne(Location::class);
    }
    public function country()
    {
        return $this->hasOne(Country::class);
    }
    public function customer(){
        return $this->belongsToMany(profile::class);
    }
}

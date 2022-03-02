<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public function locations()
    {
        return $this->hasMany(Location::class);
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

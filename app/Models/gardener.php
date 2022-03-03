<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gardener extends Model
{
    use HasFactory;
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function customers()
    {
        return $this->belongsToMany(profile::class);
    }
}

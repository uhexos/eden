<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
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
    public function gardeners(){
        return $this->belongsToMany(gardener::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    public function medal()
    {
        return $this->hasOne(Medal::class);
    }

    public function winners()
    {
        return $this->hasMany(Winner::class);
    }
}

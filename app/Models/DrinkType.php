<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrinkType extends Model
{
    public function drinks()
    {
        return $this->belongsToMany('App\Models\Drink');
    }
}

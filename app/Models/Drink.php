<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand',
        'flavor',
        'price',
        'type',
        'mililiters',
        'quantity'
    ];

    public function getPriceAttribute($value) : string
    {
        return 'R$ '.number_format($value, 2, ',', '.');
    }

    /**
     * Get the type record associated with the soda.
     */
    public function type()
    {
        return $this->hasOne('App\Models\DrinkType');
    }
}

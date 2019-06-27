<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use Searchable;

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
        'quantity',
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
        return $this->hasOne('App\Models\DrinkType', 'id', 'type_id');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array['type'] = ['name' => $this->type->name];

        unset($array['updated_at'], $array['created_at'], $array['type_id']);

        return $array;
    }
}

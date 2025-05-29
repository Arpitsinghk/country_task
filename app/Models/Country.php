<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['country_name'];

        public function states()
    {
        return $this->hasMany(State::class);
    }

     protected static function booted()
    {
        static::deleting(function ($country) {
            $country->states()->each(function ($state) {
                $state->delete();
            });
        });
    }


}

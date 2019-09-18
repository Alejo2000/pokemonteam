<?php

namespace Pokemon;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = ['name','avatar','slug'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function pokemons()
    {
      return $this->hasMany('Pokemon\Pokemon');
    }

}

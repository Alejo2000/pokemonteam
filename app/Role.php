<?php

namespace Pokemon;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  public function users()
  {
    return $this->belongToMany(Pokemon\User);
  }
}

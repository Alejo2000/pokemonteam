<?php

namespace Pokemon;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
  public function trainer()
  {
    return $this->belongsTo('Pokemon\Trainer');
  }

}

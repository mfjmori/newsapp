<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  public function user() {
    return $this->belongsTo('App\User');
  }

  protected $guarded = array('id');

}

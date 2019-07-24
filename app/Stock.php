<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  public function user() {
    return $this->belongsTo('App\User');
  }

  protected $guarded = array('id');

  public static $rules = array(
    'user_id' => 'required',
    'url' => 'required|active_url',
    'title' => 'required',
    'published_at' => 'required|date',
    'likes_count' => 'integer'
  );
}

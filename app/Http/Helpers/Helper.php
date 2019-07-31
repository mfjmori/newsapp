<?php

namespace App\Http\Helpers;

class Helper
{
    public static function addActive($url)
    {
      if ($url == url()->current()) {
        return 'active';
      }
    }
}

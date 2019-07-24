<?php

namespace App\Http\Helpers;

class Helper
{
    public static function addActive($url)
    {
      if ($url == request()->fullUrl()) {
        return 'active';
      }
    }
}

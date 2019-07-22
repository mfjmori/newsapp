<?php

namespace App\Http\Helpers;

class Helper
{
    public static function addActive($category)
    {
      $currentCategory = str_replace(route('articles.index'),"",request()->fullUrl());
      if ($currentCategory == $category) {
        return 'active';
      }
    }
}

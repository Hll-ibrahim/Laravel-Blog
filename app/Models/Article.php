<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    function getCtegory() {
      return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
}

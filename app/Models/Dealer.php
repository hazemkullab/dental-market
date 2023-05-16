<?php

namespace App\Models;

use App\Models\Category;


class Dealer extends BaseModel
{
  public function category()
  {
    return $this->belongsTo(Category::class)->withDefault();
  }

  public function products ()
  {
     return $this->hasMany(Product::class);
  }
}

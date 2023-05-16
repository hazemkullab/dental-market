<?php

namespace App\Models;

use App\Models\Dealer;


class Product extends BaseModel
{
   public function dealer()
   {
     return $this->belongsTo(Dealer::class)->withDefault();
   }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    public function lists() {
      return $this->belongsTo('\APP\Lists');
    }
}

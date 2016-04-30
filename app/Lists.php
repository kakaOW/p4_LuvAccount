<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    // protected $fillable = ['subject','description','totalPoint'];
    public function entry() {
      return $this->hasMany('\App\Entry');
    }
}

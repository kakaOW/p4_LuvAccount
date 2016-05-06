<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = ['date', 'title', 'story', 'points', 'color', 'deleteEntry'];
    public function lists() {
      return $this->belongsTo('\App\Lists');
    }
    public function user() {
    return $this->belongsTo('\App\User');
}
}

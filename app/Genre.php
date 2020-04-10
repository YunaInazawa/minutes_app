<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Genre extends Model
{
    public function reports()
    {
        return $this->hasMany('App\Report');
    }
}

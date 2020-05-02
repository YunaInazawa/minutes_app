<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function reports()
    {
        return $this->hasMany('App\Report');
    }
}

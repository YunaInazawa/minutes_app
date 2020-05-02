<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportDetail extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function report(){
        return $this->belongsTo('App\Report');
    }
}

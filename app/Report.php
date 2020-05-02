<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function genre(){
        return $this->belongsTo('App\Genre');
    }

    public function report_details()
    {
        return $this->hasMany('App\ReportDetail');
    }
}

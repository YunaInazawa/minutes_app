<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Report extends Model
{
    public function genre(){
        return $this->belongsTo('App\Genre');
    }

    public function report_details()
    {
        return $this->hasMany('App\ReportDetail');
    }
}

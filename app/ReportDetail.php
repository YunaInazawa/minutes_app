<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class ReportDetail extends Model
{
    public function report(){
        return $this->belongsTo('App\Report');
    }
}

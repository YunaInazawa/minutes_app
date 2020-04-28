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
    
    //ﾌｨﾙﾀ
    public function scopeGenre($query,?int $genre_id)
    {
        if(!is_null($genre_id)){
            return $query->where('genre_id',$genre_id);
        }
        return $query;
    }

    //ｿｰﾄ
    public function scopeSort($query,?int $sort)
    {
        if($sort == 2){
            return $query->orderBy('created_at','ASC');
        }else{
            return $query->orderBy('created_at','DESC');
        }
    }

}

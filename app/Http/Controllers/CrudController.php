<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Genre;
use App\Report;
use App\ReportDetail;

class CrudController extends Controller
{
    public function index(){
        return view('index');
    }
    public function show( $id = 0 ){
        return view('detail');
    }
    
    public function create(){
        return view('create');
    }
    public function new(){
        // return redirect('');
    }

    public function edit( $id = 0 ){
        $genre_data = Genre::where('genre_name', '!=', '未選択')->get();
        $report_data = Report::where('id', $id)->first();
        $detail_data = ReportDetail::where('report_id', $id)->get();

        return view('edit', ['genre_data' => $genre_data, 'report_data' => $report_data, 'detail_data' => $detail_data]);
    }
    public function update(){
        // return redirect('');
    }

    public function delete( $id = 0 ){
        // return redirect('');
    }
}

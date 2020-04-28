<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\ReportDetail;
use App\Genre;

class CrudController extends Controller
{
    public function index(Request $request){
        $data = $request->genre_id;

        $reports = Report::with('genre')->join('genres','reports.genre_id','genres.id')
        ->select('reports.*')
        ->genre(request('genre'))
        ->sort(request('sort'))->get();

        $genres = Genre::orderBy('id','DESC')->get();

        return view('index',compact('reports','genres'));
    }

    public function show($id){
        $report = Report::with('genre')->join('genres','reports.genre_id','genres.id')->select('reports.*')->find($id);
        $report_details = ReportDetail::where('report_id',$id)->get();

        return view('detail',compact('report','report_details'));
    }
    
    public function create(){
        return view('create');
    }
    public function new(){
        // return redirect('');
    }

    public function edit( $id = 0 ){
        return view('edit');
    }
    public function update(){
        // return redirect('');
    }

    public function delete( $id = 0 ){
        // return redirect('');
    }
}

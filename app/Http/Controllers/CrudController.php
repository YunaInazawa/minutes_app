<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Genre;
use App\Report;
use App\ReportDetail;

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
        $genre_data = Genre::where('genre_name', '!=', '未選択')->get();
        return view('create', ['genre_data' => $genre_data]);
    }
    public function new( Request $request ){
        // バリデーション後の値保持(genre_input)
        $request -> session() -> regenerateToken();

        $validatedData = $request->validate([
            'title_input' => 'required',
            'user_input' => 'required',
        ]);

        $now = Carbon::now();
        
        $title = $request->input('title_input');
        $genre = $request->input('genre_input');
        $meetingday = $request->input('meetingday_input');
        $user = $request->input('user_input');
        $subtitle_count = $request->input('subtitle_count');

        $subtitle = array();
        $contents = array();
        $count = 0;
        for( $i = 1; $i <= $subtitle_count; $i++ ){
            if( !empty($request->input('subtitle_input' . $i)) && !empty($request->input('contents_input' . $i)) ){
                $subtitle[] = $request->input('subtitle_input' . $i);
                $contents[] = $request->input('contents_input' . $i);
                $count++;
            }
        }

        // DB 登録
        if( Genre::where('genre_name', $genre)->count() == 0 ){
            $add_genre = new Genre;
            $add_genre->genre_name = $genre;
            $add_genre->created_at = $now;
            $add_genre->updated_at = $now;
            $add_genre->save();
        }else{
            $add_genre = Genre::where('genre_name', $genre)->first();
        }

        $add_report = new Report;
        $add_report->title = $title;
        $add_report->genre_id = $add_genre->id;
        $add_report->user = $user;
        $add_report->meeting_date = $meetingday;
        $add_report->created_at = $now;
        $add_report->updated_at = $now;
        $add_report->save();

        for( $i = 0; $i < $count; $i++ ){
            $add_detail = new ReportDetail;
            $add_detail->subtitle = $subtitle[$i];
            $add_detail->content = $contents[$i];
            $add_detail->report_id = $add_report->id;
            $add_detail->created_at = $now;
            $add_detail->updated_at = $now;
            $add_detail->save();
        }

        return redirect('/show/' . $add_report->id);
    }

    public function edit( $id = 0 ){
        return view('edit');
    }
    public function update( Request $request ){
        // return redirect('');
    }

    public function delete( $id = 0 ){
        // return redirect('');
    }
}

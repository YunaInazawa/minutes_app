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
    public function update( Request $request ){
        // バリデーション後の値保持(genre_input)、議題いっこは必要にする？
        $request -> session() -> regenerateToken();

        $validatedData = $request->validate([
            'title_input' => 'required',
            'user_input' => 'required',
        ]);

        $now = Carbon::now();
        
        $id = $request->input('report_id');
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

        // DB 更新
        if( Genre::where('genre_name', $genre)->count() == 0 ){
            $add_genre = new Genre;
            $add_genre->genre_name = $genre;
            $add_genre->created_at = $now;
            $add_genre->updated_at = $now;
            $add_genre->save();
        }else{
            $add_genre = Genre::where('genre_name', $genre)->first();
        }

        $change_report = Report::where('id', $id)->first();
        $change_report->title = $title;
        $change_report->genre_id = $add_genre->id;
        $change_report->user = $user;
        $change_report->meeting_date = $meetingday;
        $change_report->updated_at = $now;
        $change_report->save();

        ReportDetail::where('report_id', $id)->delete();

        return view('update', ['t' => $title, 'g' => $genre, 'm' => $meetingday, 'u' => $user, 's' => $count]);
        // return redirect('');
    }

    public function delete( $id = 0 ){
        // return redirect('');
    }
}

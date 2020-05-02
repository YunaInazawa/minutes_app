<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

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
    public function new( Request $request ){
        // バリデーション、ＤＢ登録
        $request -> session() -> regenerateToken();

        $now = Carbon::now();
        
        $name = array();
        $name[] = $request->input('title_input');
        $name[] = $request->input('genre_input');
        $name[] = $request->input('meetingday_input');
        $name[] = $request->input('user_input');
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

        return view('new', ['name' => $name, 'subtitle' => $subtitle, 'contents' => $contents, 'count' => $count]);
        // return redirect('');
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

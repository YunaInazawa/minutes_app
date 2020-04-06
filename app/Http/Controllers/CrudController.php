<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * TOP画面を表示
     */
    public function index(){
        return view('index');
    }

    /**
     * 検索結果をTOP画面に表示
     * $id = 「genres」検索した行の id
     */
    public function search( $id = 0 ){
        return view('index', ['id' => $id]);
    }

    /**
     * 議事録の詳細画面を表示
     * $id = 「reports」選択した行の id
     */
    public function show( $id = 0 ){
        return view('show', ['id' => $id]);
    }

    /**
     * 新規作成画面を表示
     */
    public function new(){
        return view('new');
    }

    /**
     * DB にデータを追加
     */
    public function create(){
        // 作成した記事に飛ぶ
        return redirect('/');
    }

    /**
     * 編集画面を表示
     * $id = 「reports」編集する行の id
     */
    public function edit( $id = 0 ){
        return view('edit', ['id' => $id]);
    }

    /**
     * DB のデータを更新
     * $id = 「reports」更新する行の id
     */
    public function update( $id = 0 ){
        // 更新した記事に飛ぶ
        return redirect('/');
    }

    /**
     * DB のデータを削除
     * $id = 「reports」削除する行の id
     */
    public function delete( $id = 0 ){
        // TOPに飛ぶ
        return redirect('/');
    }
}

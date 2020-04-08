@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title' , 'トップ')

@section('content')  
    <div class="container">
        <div class="row">
            <div class="top_add col-sm-12 col-md-2 col-lg-6 pl-5 my-2">
                <button type="button" class="btn btn-success">
                    <i class="fas fa-plus"></i> 議事録作成
                </button>
            </div>
            
            <div class="col-sm-6 col-md-5 col-lg-3 my-2" >
                <form class="top_select">
                    <p>ジャンル：</p>
                    <select name="genre" id="genre">
                        <option value="サンプル">選択してください</option>
                        <option value="1">新入生歓迎2019</option>
                        <option value="2">送別会2019</option>
                        <option value="3">赤ちゃん本舗2019</option>
                    </select>
                </form>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-3 my-2">
                <form class="top_select">
                    <p>ソート：</p>
                    <select name="sort" id="sort">
                        <option value="1">日付が新しい順</option>
                        <option value="2">日付が古い順</option>
                    </select>
                </form>
            </div>

            </div>
            <div class="col-sm-12 col-md-10 mx-auto my-3">
                <table class="table table-hover">
                    @for($i = 0; $i < 15; $i++)
                        <tr>
                            <td scope="row" class="title"><h2><b>サンプル</b></h2></td>
                            <td>ジャンル：送別会</td>
                            <td class="date">会議日：2020/03/16<br>作成日：2020/03/17</td>
                        </tr>
                    @endfor
                </table>
            </div>
        </div>
    </div>
@endsection
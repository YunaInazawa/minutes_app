@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title' , 'トップ')

@section('content')  
    <div class="container">
        <div class="row">
            <div class="top_add col-sm-12 col-md-4 col-lg-6 pl-5 my-2">
                <a href="/create" type="button" class="btn btn-success" >
                    <i class="fas fa-plus"></i> 議事録作成
                </a>
            </div>
            
            <div class="col-sm-12 col-md-8 col-lg-6 my-2" >
                <form class="top_select" action="/" method="get" id="filter">
                    <p>ジャンル：</p>
                    <select name="genre" id="genre" onchange="submit(this.form)">
                        <option value="" {{request()->query('genre')== null ? 'selected' : ''}}>すべて</option>
                        @foreach($genres as $genre)
                        <option value="{{$genre->id}}" {{request()->query('genre') == $genre->id ? 'selected' : ''}}>{{$genre->genre_name}}</option>
                        @endforeach
                    </select>

                    <p class="ml-2">ソート：</p>
                    <select name="sort" id="sort" onchange="submit(this.form)">
                        <option value="1" {{request()->query('sort') == 1 ? 'selected' : ''}}>日付が新しい順</option>
                        <option value="2" {{request()->query('sort') == 2 ? 'selected' : ''}}>日付が古い順</option>
                    </select>
                </form>
            </div>

            </div>
            <div class="col-sm-12 col-md-10 mx-auto my-3">
                <hr>
                    @foreach($reports as $report)    
                        <a href="/show/{{$report->id}}">
                            <div class="report">
                            <p class="title"><h2><b>{{$report->title}}</b></h2></p>
                            <p class="genre">ジャンル：{{$report->genre->genre_name}}</p>
                            <p class="date">会議日：{{$report->meeting_date}}<br>作成日：{{$report->created_at->format('Y-m-d')}}</p>        
                            </div>
                        </a>               
                    <hr>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
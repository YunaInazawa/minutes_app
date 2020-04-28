@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('title' , $report->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">トップ</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{$report->title}}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-12 col-md-6">
                <h1><b>{{$report->title}}</b></h1>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="date">会議日：{{$report->meeting_date}}<br>作成日：{{$report->created_at->format('Y-m-d')}}</div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div>作成者：{{$report->user}}</div>
            </div>
            <div class="col-12">
                <div>ジャンル：<a href="#">{{$report->genre->genre_name}}</a></div>
                <hr>
            </div>
    
            </div>
            <div class="col-10 mx-auto">
                @foreach($report_details as $report_detail)
                    <h3>
                        <div class="subtitle" data-toggle="collapse" href="#collapse{{ $report_detail->id }}" aria-expand="false" aria-controls="collapse{{ $report_detail->id }}" content="▼">{{$report_detail->subtitle}}</div>
                    </h3>
                    <div class="collapse multi-collapse show mb-3" id="collapse{{ $report_detail->id }}">
                        <div class="card card-body">
                            {{$report_detail->content}}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-12">
                <hr>

                <div class="mb-4 mr-5 footer_btn">
                    <a href="/edit/{{$report->id}}" class="btn btn-secondary"><i class="fas fa-pen"></i> 編集</a>
                </div>
            </div>
        </div>
    </div>
@endsection
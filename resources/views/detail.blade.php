@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('title' , 'サンプル')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">Top</a></li>
                      <li class="breadcrumb-item active" aria-current="page">サンプル</li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm-12 col-md-6">
                <h1><b>サンプルが長くなるとどうしよう</b></h1>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="date">会議日：2020/03/16<br>作成日：2020/03/17</div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div>作成者：サンプル太郎</div>
            </div>
            <div class="col-12">
                <div><a href="#">送別会2019</a></div>
                <hr>
            </div>
    
            </div>
            <div class="col-10 mx-auto">
                @for($i = 1; $i < 6; $i++)
                    <h3>
                        <div class="subtitle" data-toggle="collapse" href="#collapse{{ $i }}" aria-expand="false" aria-controls="collapse{{ $i }}" content="▼">{{ $i }},議題</div>
                    </h3>
                    <div class="collapse multi-collapse show mb-3" id="collapse{{ $i }}">
                        <div class="card card-body">
                            @for($j = 0; $j < 100; $j++)
                                サンプルです
                            @endfor
                        </div>
                    </div>
                @endfor
            </div>
            <div class="col-12">
                <hr>

                <div class="mb-4 mr-5 footer_btn">
                    <div class="btn btn-secondary"><i class="fas fa-pen"></i> 編集</div>
                </div>
            </div>
        </div>
    </div>
@endsection
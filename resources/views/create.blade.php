@extends('layouts/app')

@section('javascript')
    <script src="{{ asset('js/create.js') }}" defer></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('title' , '議事録作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">Top</a></li>
                      <li class="breadcrumb-item active" aria-current="page">議事録作成</li>
                    </ol>
                </nav>
            
            <h1>作成</h1>
            <hr>

            </div>


            <div class="col-sm-12 col-md-10 mx-auto">
                <form method="POST" action="/new">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label for="title_input">タイトル</label>
                        <input type="text" class="form-control" id="title_input" name="title_input" value="{{ old('title_input') }}" placeholder="タイトルを入力して下さい(例：新入生ほんまにくるんか？)">
                        @error('title_input')
                            <font color="red">※ {{ $message }}</font>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="genre_input">ジャンル <i class="genre_add fas fa-plus" data-toggle="modal" data-target="#genre_add_modal"></i></label>
                            <select class="form-control" id="genre_input" name="genre_input">
                                <option value="未選択" selected>選択して下さい</option>
                                @foreach( $genre_data as $data )
                                <option value="{{ $data->genre_name }}" {{ old('genre_input') == $data->genre_name ? 'selected' : '' }}>{{ $data->genre_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="meetingday_input">会議日</label>
                            <input type="date" class="form-control" id="meetingday_input" name="meetingday_input" value="{{ old('meetingday_input', date('Y-m-d')) }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="user_input">作成者</label>
                            <input type="text" class="form-control" id="user_input" name="user_input" value="{{ old('user_input') }}">
                            @error('user_input')
                            <font color="red">※ {{ $message }}</font>
                            @enderror
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="subtitle_input">議題1</label>
                            <input type="text" class="form-control" id="subtitle_input1" name="subtitle_input1" value="{{ old('subtitle_input1') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contents_input">内容1</label>
                        <textarea class="form-control" id="contents_input1" name="contents_input1" rows="10">{{ old('contents_input1') }}</textarea>
                    </div>

                    <div id="add_subtitle">
                    @if( old('subtitle_count') > 1 )
                    @for( $i = 2; $i <= old('subtitle_count'); $i++ )
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="subtitle_input">議題{{ $i }}</label>
                            <input type="text" class="form-control" id="subtitle_input{{ $i }}" name="subtitle_input{{ $i }}" value="{{ old('subtitle_input' . $i) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contents_input">内容{{ $i }}</label>
                        <textarea class="form-control" id="contents_input{{ $i }}" name="contents_input{{ $i }}" rows="10">{{ old('contents_input' . $i) }}</textarea>
                    </div>
                    @endfor
                    @endif
                    </div>

                    <button type="button" class="btn btn-success my-3" onclick="addSubtitle()">
                        <i class="fas fa-plus"></i> 議題追加
                    </button>

                    <hr>

                    <input type="hidden" id="subtitle_count" name="subtitle_count" value="{{ old('subtitle_count', '1') }}">
                    <input class="submit_button btn btn-primary mb-5" type="submit" value="確認">
                </form>

                <!-- Modal -->
                <div class="modal fade" id="genre_add_modal" tabindex="-1" role="dialog" aria-labelledby="genre_add_modal_label" aria-hidden="ture">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="genre_add_modal_label">ジャンルの追加</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form>
                            <div class="modal-body">
                                    <div class="form-group">
                                        <label for="add_genre_input">ジャンル名</label>
                                        <input type="text" class="form-control" id="add_genre_input" placeholder="例：新歓2020">
                                    </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                <button type="button" class="btn btn-primary" onclick="addGenre()">追加</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('title' , '議事録編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">Top</a></li>
                      <li class="breadcrumb-item"><a href="/show/1">サンプル</a></li>
                      <li class="breadcrumb-item active" aria-current="page">編集</li>
                    </ol>
                </nav>
            </div>
            <div class="col-9">
                <h1>編集</h1>
            </div>
            <div class="col-3">
                <div class="delete_button" data-toggle="modal" data-target="#delete_modal"><i class="fas fa-trash-alt mt-3"></i>削除</div>
            </div>
            <div class="col-12">
                <hr>
            </div>

            <div class="col-sm-12 col-md-10 mx-auto">
                <form>
                    <div class="form-group">
                        <label for="title_input">タイトル</label>
                        <input type="text" class="form-control" id="title_input" placeholder="タイトルを入力して下さい(例：新入生ほんまにくるんか？)">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="genre_input">ジャンル <i class="genre_add fas fa-plus" data-toggle="modal" data-target="#genre_add_modal"></i></label>
                            <select class="form-control" id="genre_input">
                                <option selected>選択して下さい</option>
                                @foreach( $genre_data as $data )
                                <option value="{{ $data->genre_name }}" {{ old('genre_input') == $data->genre_name ? 'selected' : '' }}>{{ $data->genre_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="meetingday_input">会議日</label>
                            <input type="date" class="form-control" id="meetingday_input">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="user_input">作成者</label>
                            <input type="text" class="form-control" id="user_input">
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="subtitle_input">議題1</label>
                            <input type="text" class="form-control" id="subtitle_input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contents_input">内容</label>
                        <textarea class="form-control" id="contents_input" rows="10"></textarea>
                    </div>

                    <button type="button" class="btn btn-success my-3">
                        <i class="fas fa-plus"></i> 議題追加
                    </button>

                    <hr>

                    <div class="submit_button btn btn-primary mb-5" type="submit">確認</div>
                    </div>
                </form>

                <!-- GenreModal -->
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
                                        <label for="title_input">ジャンル名</label>
                                        <input type="text" class="form-control" id="title_input" placeholder="例：新歓2020">
                                    </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                <button type="button" class="btn btn-primary">追加</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- DeleteModal -->
                <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modal_label" aria-hidden="ture">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="delete_modal_label">確認</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>この議事録を削除してよろしいでしょうか？</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                <button type="button" class="btn btn-primary">追加</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
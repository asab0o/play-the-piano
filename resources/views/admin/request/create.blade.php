@extends('layouts.front')
@section('title', '演奏依頼の投稿作成')

@section('content')
<div class="requestPages">
    <div class="container">
        <div class="card col-md-10 mx-auto mt-3">
            <div class="card-header row">
                <h2>演奏を依頼する</h2>
            </div>
            <div class="card-body">
                <!--フォームタグ-->
                {{ Form::open(['action' => 'Admin\RequestController@create', 'files' => true, 'class' => 'form-horizontal']) }}
                @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <h4>エラーメッセージ</h4>
                        <hr>
                        @foreach($errors->all() as $e)
                            <p>{{ $e }}</p>
                        @endforeach
                    </div>
                @endif
             <!--画像の投稿-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ __('messages.image') }}
                        <span class="badge badge-light">3：2</span>
                    </div>
                    <div class="col-md-10">
                        @for ($i = 1; $i <= 5; $i++)
                        <div class="col-md-6">
                            {{Form::file('image['.$i.']', ['class'=>'form-control custom-file-input mt-1','id'=>'fileImage-'.$i])}}
                            {{ Form::label('file-'.$i, '写真を選択（'.$i.'枚目）', ['class' => 'custom-file-label', 'data-browse' => '参照']) }}
                        </div>
                        @endfor
                    </div>
                </div>
                <!--プレビューできるようにする-->
                <div class="col-md-10">
                    <div class="filePreview">
                        <img src="" id="filePreview" class="outputFile">
                    </div>
                </div>
                <!--タイトル-->
                <div class="form-group row">
                    <div class="label col-md-2 d-md-flex justify-content-md-between w-100">
                        {{ Form::label('title', __('messages.title')) }}
                        <span class="badge badge-primary">必須</span>
                    </div>
                    <div class="col-md-8">
                        {{ Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '例：老人ホームでピアノ演奏してくれるボランティア募集！']) }} 
                    </div>
                </div>
                <!--名前-->
                <div class="form-group row">
                    <div class="label col-md-2 d-md-flex justify-content-md-between w-100">
                        {{ Form::label('name', __('messages.name_1')) }}
                        <span class="badge badge-primary">必須</span>
                    </div>
                    <div class="col-md-8">
                        {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '店名、施設名など']) }} 
                    </div>
                </div>
                <!--連絡先-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('tel_number', __('messages.tel_number')) }}
                    </div>
                    <div class="col-md-8">
                        {{ Form::text('tel_number', old('tel_number'), ['class' => 'form-control']) }} 
                    </div>
                </div>
                <!--日時-->
                <div class="form-group row">
                    <div class="label col-md-2 d-md-flex justify-content-md-between w-100">
                        {{ Form::label('date_time', __('messages.date_time')) }}
                        <span class="badge badge-primary">必須</span>
                    </div>
                    <div class="col-md-8">
                        {{ Form::text('date_time', old('date_time'), ['class' => 'form-control', 'id' => 'request_datepicker']) }} 
                        
                    </div>
                </div>
                <!--場所-->
                <div class="form-group row">
                    <div class="label col-md-2 d-md-flex justify-content-md-between w-100">
                        {{ Form::label('area', __('messages.area')) }}
                        <span class="badge badge-primary">必須</span>
                    </div>
                    <div class="col-md-8">
                        {{ Form::select('area', $prefectures, '12', ['class' => 'form-control'])}}
                    </div>
                </div>
                <!--報酬-->
                <div class="form-group row">
                    <div class="label col-md-2 d-md-flex justify-content-md-between w-100">
                        {{ Form::label('rewards', __('messages.rewards')) }}
                        <span class="badge badge-primary">必須</span>
                    </div>
                    <div class="col-md-8">
                        {{ Form::text('rewards', old('rewards'), ['class' => 'form-control']) }} 
                    </div>
                </div>
                <!--駐車場-->
                <div class="form-group row">
                    <div class="label col-md-2 d-md-flex justify-content-md-between w-100">
                        {{ Form::label('parking_lots', __('messages.parking_lots')) }}
                        <span class="badge badge-primary">必須</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group form-check form-check-inline">
                            {{ Form::radio('parking_lots', 'あり', false, ['class' => 'form-check-input', 'id' => 'parking_lot_1']) }}
                            {{ Form::label('parking_lot_1', 'あり', ['class' => 'form-check-label']) }}
                        </div>
                        <div class="form-group form-check form-check-inline">
                            {{ Form::radio('parking_lots', 'なし', false, ['class' => 'form-check-input', 'id' => 'parking_lot_2']) }}
                            {{ Form::label('parking_lot_2', 'なし', ['class' => 'form-check-label']) }}
                        </div>
                    </div>
                </div>
                <!--ジャンル-->
                <div class="form-group row">
                    <div class="label col-md-2 d-md-flex justify-content-md-between w-100">
                        {{ Form::label('genres', __('messages.genres')) }}
                        <span class="badge badge-primary">必須</span>
                    </div>
                    <div class="col-md-8">
                        @foreach ($genres as $key => $genre)
                        <!--横に並べたい-->
                        <div class="form-group form-check form-check-inline">
                        {{ Form::checkbox('genres', $genre, false, ['class' => 'form-check-input', 'id' => 'genre-'.$key]) }}
                        {{ Form::label('genre-'.$key, $genre,  ['class' => 'form-check-label']) }}
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--衣装-->
                <div class="form-group row">
                    <div class="label col-md-2 d-md-flex justify-content-md-between w-100">
                        {{ Form::label('dress', __('messages.dress')) }}
                        <span class="badge badge-primary">必須</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-check form-check-inline">
                            {{ Form::radio('dress', '指定なし', false, ['class' => 'form-check-input', 'id' => 'dress-1']) }}
                            {{ Form::label('dress-1', '指定なし', ['class' => 'form-check-label']) }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="form-check form-check-inline">
                            {{ Form::radio('dress', '指定あり', false, ['class' => 'form-check-input', 'id' => 'dress-2']) }}
                            {{ Form::label('dress-2', '指定あり',['class' => 'form-check-label']) }}
                            <!--migrationのファイルの都合上いったんコメントアウト-->
                            {{--<!--{{ Form::label('dress-2', '指定あり',['class' => 'form-check-label text-nowrap']) }}-->
                            <!--{{ Form::text('dress-2', old('dress-2'), ['class' => 'form-control', 'placeholder' => '衣装を入力']) }}-->--}}
                        </div>
                    </div>
                </div>
                <!--紹介文-->
                <div class="form-group row">
                    <div class="label col-md-2 d-md-flex justify-content-md-between w-100">
                    {{ Form::label('introduction', __('messages.introduction')) }}
                    <span class="badge badge-primary">必須</span>
                    </div>
                    <div class="col-md-8">
                    {{ Form::textarea('introduction', old('introduction'), ['class' => 'form-control', 'rows' => '10']) }}
                    </div>
                </div>
                <!--表示期間-->
                <div class="form-group row">
                    <div class="label col-md-2 d-md-flex justify-content-md-between w-100">
                    {{ Form::label('display_term', __('messages.display_term')) }}
                    <span class="badge badge-primary">必須</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-inline">
                            From: {{ Form::text('display_date_from', old('display_date_from'), ['class' => 'form-control mr-2', 'id' => 'display_datepicker_from']) }}
                            To: {{ Form::text('display_date_to', old('display_date_to'), ['class' => 'form-control', 'id' => 'display_datepicker_to']) }}
                        </div> 
                    </div>
                </div>
                <!--応募期間-->
                <div class="form-group row">
                    <div class="label col-md-2 d-md-flex justify-content-md-between w-100">
                    {{ Form::label('application_term', __('messages.application_term')) }}
                    <span class="badge badge-primary">必須</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-inline">
                            From: {{ Form::text('application_date_from', old('application_date_from'), ['class' => 'form-control mr-2', 'id' => 'application_datepicker_from']) }}
                            To: {{ Form::text('application_date_to', old('application_date_to'), ['class' => 'form-control', 'id' => 'application_datepicker_to']) }}
                        </div>
                    </div>
                </div>
                <!--登録ボタン-->
                <div>
                    {{ Form::submit( __('messages.register'), ['class' => 'btn btn-primary']) }}
                    @csrf
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
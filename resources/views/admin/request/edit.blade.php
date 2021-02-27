@extends('layouts.front')
@section('title', '演奏依頼の投稿作成')

@section('content')
<div class="requestPages">  
    <div class="container">
        <div class="card col-md-10 mx-auto mt-3">
            <div class="card-header row">
                <h2>投稿を編集する</h2>
            </div>
            <div class="card-body">
                {{ Form::open(['action' => 'Admin\RequestController@update', 'files' => true, 'class' => 'form-horizontal']) }}
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <!--画像の投稿-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ __('messages.image') }}
                    </div>
                    <div class="col-md-10">
                        @for ($i = 1; $i <= 5; $i++)
                        <div class="col-md-6">
                            {{Form::file('image['.$i.']', ['class'=>'form-control custom-file-input','id'=>'fileImage-'.$i])}}
                            {{ Form::label('file-'.$i, '写真を選択', ['class' => 'custom-file-label', 'data-browse' => '参照']) }}
                        </div>
                        @endfor
                    </div>
                </div>
                <!--タイトル-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('title', __('messages.title')) }}
                    </div>
                    <div class="col-md-8">
                        {{ Form::text('title', $request_form->title, ['class' => 'form-control', 'placeholder' => '例：老人ホームでピアノ演奏してくれるボランティア募集！']) }} 
                    </div>
                </div>
                <!--名前-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('name', __('messages.name')) }}
                    </div>
                    <div class="col-md-8">
                        {{ Form::text('name', $request_form->name, ['class' => 'form-control', 'placeholder' => '店名、施設名など']) }} 
                    </div>
                </div>
                <!--連絡先-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('tel_number', __('messages.tel_number')) }}
                    </div>
                    <div class="col-md-8">
                        {{ Form::text('tel_number', $request_form->tel_number, ['class' => 'form-control']) }} 
                    </div>
                </div>
                <!--日時-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('date_time', __('messages.date_time')) }}
                    </div>
                    <div class="col-md-8">
                        {{ Form::text('date_time',  $request_form->date_time, ['class' => 'form-control datepicker']) }} 
                    </div>
                </div>
                <!--場所-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('area', __('messages.area')) }}
                    </div>
                    <div class="col-md-8">
                        {{ Form::select('area', $prefectures, $request_form->area, ['class' => 'form-control']) }}
                    </div>
                </div>
                <!--報酬-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('rewards', __('messages.rewards')) }}
                    </div>
                    <div class="col-md-8">
                        {{ Form::text('rewards', $request_form->rewards, ['class' => 'form-control']) }} 
                    </div>
                </div>
                <!--駐車場-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('parking_lots', __('messages.parking_lot')) }}
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
                    <div class="col-md-2">
                        {{ Form::label('genres', __('messages.genre')) }}
                    </div>
                    <div class="col-md-8">
                        @foreach ($genres as $key => $genre)
                        <!--横に並べたい-->
                        <div class="form-group form-check form-check-inline">
                        {{ Form::checkbox('genres', $key, false, ['class' => 'form-check-input', 'id' => 'genre-'.$key]) }}
                        {{ Form::label('genre-'.$key, $genre,  ['class' => 'form-check-label']) }}
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--衣装-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('dress', __('messages.dress')) }}
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
                        </div>
                    </div>
                </div>
                <!--紹介文-->
                <div class="form-group row">
                    <div class="col-md-2">
                    {{ Form::label('introduction', __('messages.introduction')) }}
                    </div>
                    <div class="col-md-8">
                    {{ Form::textarea('introduction', $request_form->introduction, ['class' => 'form-control', 'rows' => '10']) }}
                    </div>
                </div>
                <!--表示期間-->
                <div class="form-group row">
                    <div class="col-md-2">
                    {{ Form::label('display_term', __('messages.display_term')) }}
                    </div>
                    <div class="col-md-8">
                    {{ Form::text('display_from', $request_form->display_from, ['class' => 'form-control datepicker']) }}
                    {{ Form::text('display_to', $request_form->display_to, ['class' => 'form-control datepicker']) }}
                    </div>
                </div>
                <!--応募期間-->
                <div class="form-group row">
                    <div class="col-md-2">
                    {{ Form::label('application_term', __('messages.application_term')) }}
                    </div>
                    <div class="col-md-8">
                    {{ Form::text('application_from', $request_form->application_from, ['class' => 'form-control datepicker']) }}
                    {{ Form::text('application_to', $request_form->application_to, ['class' => 'form-control datepicker']) }}
                    </div>
                </div>
                <!--登録ボタン-->
                <!--hiddenについて-->
                {{ Form::hidden('id', $request_form->id) }}
                <a href="{{ action('Admin\RequestController@edit', ['id' => $request_form->id]) }}" class="updateBtn btn btn-secondary">更新</a>
                <a href="{{ action('Admin\RequestController@delete', ['id' => $request_form->id]) }}" class="deleteBtn btn btn-primary">削除</a>
                @csrf
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
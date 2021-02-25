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
                {{ Form::open(['action' => 'Admin\RequestController@create', 'files' => true, 'class' => 'form-horizontal']) }}
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
                        {{ Form::label('image', __('messages.image')) }}
                    </div>
                    <div class="col-md-10">
                        <div class="custom-file">
                            @for ($i = 1; $i <= 5; $i++)
                            <div class="col-md-4">
                                {{ Form::file('image['.$i.']', ['class' => 'form-control custom-file-input', 'id' => 'customFile']) }}
                                {{ Form::label('customFile', '写真を選択', ['class' => 'custom-file-label', 'data-browse' => '参照']) }}
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <!--タイトル-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('title', __('messages.title')) }}
                    </div>
                    <div class="col-md-10">
                        {{ Form::text('title', $request_form->title, ['class' => 'form-control', 'placeholder' => '例：老人ホームでピアノ演奏してくれるボランティア募集！']) }} 
                    </div>
                </div>
                <!--名前-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('name_1', __('messages.name_1')) }}
                    </div>
                    <div class="col-md-10">
                        {{ Form::text('name_1', $request_form->name, ['class' => 'form-control', 'placeholder' => '店名、施設名など']) }} 
                    </div>
                </div>
                <!--連絡先-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('tel_number', __('messages.tel_number')) }}
                    </div>
                    <div class="col-md-10">
                        {{ Form::text('tel_number', $request_form->tel_number, ['class' => 'form-control']) }} 
                    </div>
                </div>
                <!--日時-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('date_time', __('messages.date_time')) }}
                    </div>
                    <div class="col-md-10">
                        {{ Form::text('date_time',  $request_form->date_time, ['class' => 'form-control']) }} 
                    </div>
                </div>
                <!--場所-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('area', __('messages.area')) }}
                    </div>
                    <div class="col-md-10">
                       {{Form::selectRange('area' , 1, 31, $request_form->area, ['class'=>'form-control'])}}
                    </div>
                </div>
                <!--報酬-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('rewards', __('messages.rewards')) }}
                    </div>
                    <div class="col-md-10">
                        {{ Form::text('rewards', $request_form->rewards, ['class' => 'form-control']) }} 
                    </div>
                </div>
                <!--駐車場-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('parking_lot', __('messages.parking_lot')) }}
                    </div>
                    <div class="col-md-10">
                        <div class="form-check form-check-inline">
                            {{ Form::radio('', 'あり', false) }}
                            {{ Form::label('', 'あり') }}
                        </div>
                        <div class="form-check form-check-inline">
                            {{ Form::radio('', 'なし', false) }}
                            {{ Form::label('', 'なし') }}
                        </div>
                    </div>
                </div>
                <!--ジャンル-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('genres', __('messages.genre')) }}
                    </div>
                    <div class="col-md-10 row">
                        @foreach ($genres as $key => $genre)
                        <!--横に並べたい-->
                        <div class="form-control-inline">
                        {{ Form::checkbox('genre', $key, false, ['class' => 'form-control', 'id' => 'genre-'.$key]) }}
                        {{ Form::label('genre-'.$key, $genre) }}
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--衣装-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('dress', __('messages.dress')) }}
                    </div>
                    <div class="col-md-10">
                        <div class="form-check form-check-inline">
                            {{ Form::radio('', '指定なし', false) }}
                            {{ Form::label('', '指定なし') }}
                        </div>
                        <div class="form-check form-check-inline">
                            {{ Form::label('', '指定あり') }}
                            {{ Form::text('', null, ['placeholder' => '衣装を入力']) }}
                        </div>
                    </div>
                </div>
                <!--紹介文-->
                <div class="form-group row">
                    <div class="col-md-2">
                    {{ Form::label('introduction', __('messages.introduction')) }}
                    </div>
                    <div class="col-md-10">
                    {{ Form::textarea('introduction', $request_form->introduction, ['class' => 'form-control', 'rows' => '10']) }}
                    </div>
                </div>
                <!--表示期間-->
                <div class="form-group row">
                    <div class="col-md-2">
                    {{ Form::label('display_term', __('messages.display_term')) }}
                    </div>
                    <div class="col-md-10">
                    {{ Form::text('display_from', $request_form->display_from, ['class' => 'form-control datepicker_2']) }}
                    {{ Form::text('display_to', $request_form->display_to, ['class' => 'form-control datepicker_2']) }}
                    </div>
                </div>
                <!--応募期間-->
                <div class="form-group row">
                    <div class="col-md-2">
                    {{ Form::label('application_term', __('messages.application_term')) }}
                    </div>
                    <div class="col-md-10">
                    {{ Form::text('application_from', $request_form->application_from, ['class' => 'form-control datepicker_2']) }}
                    {{ Form::text('application_to', $request_form->application_to, ['class' => 'form-control datepicker_2']) }}
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
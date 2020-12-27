@extends('layouts.front')
@section('title', 'プロフィール画面の編集')
    
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>プロフィールの編集</h2>
                {{ Form::open(['action' => 'Admin\PlayerController@update', 'files' => true, 'class' => "form-horizontal"]) }}
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                <!--画像の設定-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('image', __('messages.image')) }}
                    </div>
                    @for ($i = 1; $i <= 3; $i++)
                    <div class="col-md-4">
                        <!--画像登録した時に表示-->
                        <!--{{--@if ($post->image_path)-->
                        <!--{{ HTML::image($post->image_path) }}-->
                        <!--<div class="">-->
                        <!--    <div class="btn btn-secondary">-->
                        <!--        <a href="{{ action('Admin\NewsController@edit', ['id' => $profile->id]) }}">編集</a>-->
                        <!--    </div>-->
                        <!--    <div class="btn btn-secondary">-->
                        <!--        <a href="{{ action('Admin\NewsController@edit', ['id' => $profile->id]) }}">削除</a>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--画像の登録がまだの時-->
                        <!--@else-->
                        <!--{{ Form::file('image', ['class' => 'form-control-file']) }}-->
                        <!--@endif--}}-->
                    </div>
                    @endfor
                </div>
                <!--名前-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('name_1', __('messages.name_1')) }}
                    </div>
                    <div class="col-md-5">
                        {{ Form::text('firstname_1', $player_form->firstname_1, ['class' => 'form-control', 'placeholder' => '山田']) }}
                    </div>
                    <div class="col-md-5">
                        {{ Form::text('lastname_1', $player_form->lastname_1, ['class' => 'form-control', 'placeholder' => '太郎']) }}
                    </div>
                </div>
                <!--ナマエ-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('name_2', __('messages.name_2')) }}
                    </div>
                    <div class="col-md-5">
                        {{ Form::text('firstname_2', old('firstname_2'), ['class' => 'form-control', 'placeholder' => 'ヤマダ']) }}
                    </div>
                    <div class="col-md-5">
                        {{ Form::text('lastname_2', old('lastname_2'), ['class' => 'form-control', 'placeholder' => 'タロウ']) }}
                    </div>
                </div>
                <!--生年月日-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('birthday', __('messages.birthday')) }}
                    </div>
                    <div class="col-md-4">
                        {{ Form::selectRange('birth_year', 1920, 2020, old('birth_year'), ['class'=>'form-control'])}}
                    </div>
                    <div class="col-md-3">
                        {{ Form::selectMonth('birth_month', old('birth_month'), ['class'=>'form-control'])}}
                    </div>
                    <div class="col-md-3">
                        {{ Form::selectRange('birth_ day' , 1, 31, old('birth_day'), ['class'=>'form-control'])}}
                    </div>
                </div>
                <!--性別 -->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('gender', __('messages.gender')), ['class' => 'form-control'] }}
                    </div>
                    <div class="col-md-10 row">
                        <!--foreachの引数を強制的に配列-->
                        @foreach ($genders as $key => $gender)
                        <!--クラスを再確認-->
                        <div class="col-md-2">
                            {{ Form::radio('gender', $key, false, ['class'=>'form-control','id'=>'gender-'.$key])}}
                            {{ Form::label('gender-'.$key, $gender) }}
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--ピアノ暦-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('experience', __('messages.experience')) }}
                    </div>
                    <div class="col-md-8">
                        {{ Form::number('experience', old('experience'), ['class' => 'form-control', 'placeholder' => '半角数字で入力']) }}
                    </div>
                    <div class="col-md-2">
                        <label>年</label>
                    </div>
                </div>
                <!--活動エリア-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('area', __('messages.area')) }}
                        <!--選択にするか入力にするか-->
                    </div>
                    <div class="col-md-10">
                        {{Form::selectRange('area' , 1, 31, 1, ['class'=>'form-control'])}}
                    </div>
                </div>
                <!--自己紹介-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('introduction', __('messages.introduction')) }}
                    </div>
                    <div class="col-md-10">
                    {{ Form::textarea('introduction', null, ['class' => 'form-control', 'rows' => '5']) }}
                    </div>
                </div>
                <!--参考動画-->
                <div class="form-group row">
                    <div class="col-md-2">
                        {{ Form::label('performance', __('messages.performance')) }}
                    </div>
                    <div class="col-md-10">
                        {{ Form::text('performance', null, ['class' => 'form-control', 'placeholder' => 'URL']) }}
                    </div>
                </div>
                <!--登録ボタン-->
                {{ Form::submit(__('messages.register'), ['class' => 'btn btn-secondary']) }}
                @csrf
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
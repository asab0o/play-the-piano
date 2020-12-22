@extends('layouts.front')
@section('title', 'playThePiano')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!--カルーセルをいれたい-->
            <div class="col-md-10 mx-auto">
                <div class="boder-bottom">
                    <h2>新着オファー</h2>
                    <a href="{{ url('request/index') }}">一覧をみる</a>
                </div>
            </div>
            <div class="col-md-8 mx-auto">
                <div class="col-md-12">Newアイコン、右端にcreated_up</div>
                <div class="title col-md-12">タイトル</div>
                {{--<!--@if ($post->image_path)-->
                <!--    @foreach($imageList as $image)-->
                <!--        <div class="image col-auto">-->
                <!--        </div>-->
                <!--    @endforeach-->
                <!--@endif-->--}}
                <div class="text col-md-12"></div>
                <!--報酬など、イントロ、URLを3列に表示させたい-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="">
                    <h2>演奏者</h2>
                    <a href="{{ url('player/index') }}">一覧をみる</a>
                </div>
                <!--新着順にカード形式で表示させたい-->
                {{--@foreach
                <div class="col-md-4">
                    <div class="image"></div>
                    <div class="name"></div>
                </div>
                @endforeach--}}
            </div>
        </div>
    </div>
    
@endsection
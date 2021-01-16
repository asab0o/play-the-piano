@extends('layouts.front')

@section('title', '演奏依頼')

@section('content')
    <div class="container-fluid">
        <div class="col-md-10 mx-auto mt-3">

            <h3>{{ $request->title }}</h3>
            <hr color="">
            <div class="card">
                <div class="card-header">
                        {{ __('messages.display_term') }} :{{ $request->display_date_from }} ~ {{ $request->display_date_to }}
                </div>
                <div class="card-body col-md-6 row">
                    <div class="col-md-3">
                        {{ __('messages.name') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->name }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.date_time') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->date_time }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.area') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->area }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.rewards') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->rewards }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.parking_lots') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->parking_lots }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.genres') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->genres }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.dress') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->dress }}
                    </div>
                    <div class="col-md-3">
                        {{ __('messages.introduction') }}
                    </div>
                    <div class="col-md-9">
                        {{ str_limit($request->introduction, 300) }}
                    </div>
                    @if($request->tel_number)
                    <div class="col-md-3">
                        {{ __('messages.tel_number') }}
                    </div>
                    <div class="col-md-9">
                        {{ $request->tel_number }}
                    </div>
                    @endif
                </div>
                @for($i = 1; $i <= 5; $i++)
                @if($request->{"image_path_".$i})
                <div class="card-body col-md-6">
                    <div class="image col-md-4 text-right mt-4">
                        <img src="{{ asset('storage/image/'.$request->{'image_path_'.$i}) }}">
                    </div>
                </div>
                @endif
                @endfor
             </div>   
        </div>
    </div>
@endsection

@extends()

@section('title', 'プロフィール画面')

@section('content')


<div class="container-fluid">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>Myプロフィール</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group">
                        <div class="form-inline"></div>
                        <label for="first_name" ></label>
                    </div>
                    
@endsection

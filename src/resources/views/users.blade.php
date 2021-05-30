@extends('layout')

@section('content')

<div class="container">
    <h1><font color='blue'> ユーザー一覧</font></h1>
    <div class="row justify-content-center">
        <div class="col-md-10">
            @foreach ($users as $user)
            <div class="card">
                <div class="card-body">
                    <a class="nav-link" href="{{ url('/users/'. $user->id) }}">{{ $user->name }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>



</div>


@endsection





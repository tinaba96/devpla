@extends('layout')

@section('content')

<body style="background:url(https://devpla.s3.ap-northeast-1.amazonaws.com/devpla/bg.jpeg); background-size:cover;">
@if ($follows -> isEmpty())
    <h1 align='center'>
        <font color="white"> No one </font>
    </h1>
@endif

<div class = "container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @foreach($follows as $follow)
            <div class="card post-card">
                <div class = "car-body">
                    <div class="row">
                        <div class="col-md-4">
                        <img width="40%" src="{{ asset('storage/profiles/'.$follow->profile_image) }}" alt="profile_image">
                        </div>
                        <div class="col-md-4">
                            <a class="nav-link" href="{{ url('/users/'. $follow->id) }}">
                            <h3> {{ $follow->name }} </h3> 
                            </a>
                        </div>
                        <div align='right' class="col-md-4">
                            @if (Auth::user()->id != $follow->id)
                                @if (Auth::user()->is_following($follow->id) || Auth::user()->id == $follow->id )
                                    <form action='/users/ {{ $user->id }}/unfollow' method='POST'>
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class='btn btn-warning'> Unfollow </button>
                                    </form>
                                @else
                                    <form action='/users/{{ $user->id }}/follow' method='POST'>
                                    @csrf
                                    <button type='submit' class='btn btn-primary'> Follow</button>
                                    </form>
                                @endif 
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</div>


@endsection

<style>

    .post-card{
        margin-top: 10px;
        margin-bottom: 10px;
    }

</style>

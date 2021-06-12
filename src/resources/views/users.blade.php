@extends('layout')

@section('content')

<div class="container">
    <h1><font color='blue'> ユーザー一覧</font></h1>
    <div class="row justify-content-center">
        <div class="col-md-10">
            @foreach ($users as $user)
            <div class="card post-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                        <img width="40%" src="{{ asset('storage/profiles/'.$user->profile_image) }}" alt="profile_image">
                        </div>
                        <div class="col-md-4">
                        <a class="nav-link" href="{{ url('/users/'. $user->id) }}"><h3>{{ $user->name }}</h3></a>
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-2">
                                @if (Auth::user()->id != $user->id)
                                    @if (Auth::user()->is_following($user->id) || Auth::user()->id == $user->id )
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




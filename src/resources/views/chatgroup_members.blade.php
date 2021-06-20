@extends('layout')

@section('content')


<div class="container">
    <h1 style="color:green; text-align:center;">チャットメンバー</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (!Auth::user()->user_chatgroup()->where('chatgroup_id', $chatgroup->id)->exists() )
                <form action='/homechat/{{ $chatgroup->id }}/bemember' method='POST'>
                @csrf
                <button type='submit' class='btn btn-primary'> メンバーになる </button>
                </form>
            @endif
            @foreach($members as $member)
            <div class="card">
                <div class="card-bpdy">
                    {{ $member->users()->first()->name }}
                </div>
            </div>
            @endforeach
        </div>



    </div>

</div>




@endsection

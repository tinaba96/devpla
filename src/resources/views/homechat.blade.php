<style>
    .post-card{
        margin-top: 20px;
        margin-bottom: 20px;
    }

</style>


@extends('layout')

@section('content')

<div class="container">
    <h1 style="color:green; text-align:center;">チャットグループ</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form align='right' action='/homechat/create' method='GET'>
            @csrf
            <button type='submit' class='btn btn-primary' style='background-color:red'>New Group</button>
            </form>
        </div>
    </div>

    <div class="row">
        @foreach($groups as $group)
        <div class="col-md-6">
            <div class="card post-card">
                <div class="card-body">
                    <a href="{{ url('/homechat/' . $group->id) }}">
                    <h2>{{ $group->name }}</h2>
                    </a>
                    <form align='right' action='/homechat/{{ $group->id }}/members/' method='GET'>
                    @csrf
                    <button type='submit' class='btn btn-primary' style='background-color:green'>メンバー一覧</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach 
    </div>
</div>



@endsection

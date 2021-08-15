@extends('layout')

@section('content')
<body style="background:url(https://devpla.s3.ap-northeast-1.amazonaws.com/devpla/bg.jpeg); background-size:cover;">

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                @if (Auth::user()->id == $user->id)
                <h3><font color="blue">マイページ</font></h3>
                @else
                <h3><font color="blue">{{ $user->name }} </font></h3>
                @endif

	            <img width="200px" src="{{ $user -> profile_image }}" alt="profile_image">
                @if (Auth::user()->id == $user->id)
                <a href =  {{ url('/mypage/image/edit/') }}> 写真の編集 </a>
                @endif

                <br>
                <br>

                <div class="row justify-content-center">
                    <div align='center' class="col-md-6">
                        <a href = {{ url('/users/' . $user->id . '/followers') }}>
                        {{ $user->followers()->count() }}
                        </a>
                    </div>
                    <div align='center' class="col-md-6">
                        <a href = {{ url('/users/' . $user->id . '/following') }}>
                        {{ $user->following()->count() }}
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <p> Followers </p>
                    </div>
                    <div class="col-md-6">
                        <p> Following </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (Auth::user()->id == $user->id)
                    <div align='right'> <a href =  {{ url('/mypage/edit/') }}> 編集 </a></div>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <h4><font color="#ff9933">スキル</font></h4>
                            <div class="card">
                                <div class="card-body">
                                {{ $user->my_skills }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <h4><font color="#ff9933">興味ある分野</font></h4>
                            <div class="card">
                                <div class="card-body">
                                {{ $user->topics_interest }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <h4><font color="#ff9933">学歴</font></h4>
                            <div class="card">
                                <div class="card-body">
                                {{ $user->edu_background }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <h4><font color="#ff9933">職歴</font></h4>
                            <div class="card">
                                <div class="card-body">
                                {{ $user->work_history }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <h4><font color="#ff9933">業績と資格</font></h4>
                            <div class="card">
                                <div class="card-body">
                                {{ $user->my_skills }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->id == $user->id)
                    <div>
                        <a href =  {{ url('user/delete') }}> 退会予定の方はこちら </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>


    </div>



</div>

@endsection

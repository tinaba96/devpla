@extends('layout')

<head>
<script src="https://kit.fontawesome.com/7c7377020a.js" crossorigin="anonymous"></script>
</head>

@section('content')
<body style="background:url(https://devpla.s3.ap-northeast-1.amazonaws.com/devpla/bg.jpeg); background-size:cover;">
    <div class="container mt-4">
    <h1 style="color:green; text-align:center;">投稿一覧</h1>

    <ul style='float:right;' class="navbar-nav mr-auto">
        @auth
    <a href="/post" class="btn2">新規投稿</a>
        @endauth
    </ul>
    <br>
    </div>

    <div class="container mt-4">
    <!-- <a href="{{ route('posts.create') }}" class="btn btn-primary">
        投稿を新規作成する
    </a> -->
	@foreach ($posts as $post)

            <!-- <div class="col-xs-6 col-md-8"> -->
            <div class="col-xs-6 justify-content-center">
                <div class="card mb-4">

                    <div class="card-header">
                        <h2> {{ $post->user()->first()->name }}</h2>
                        {{ $post->title }}
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {!! nl2br(Str::limit($post->body_html, 200)) !!} 
                        </p>
	@foreach ($images as $image)
		    @if (intval($post->created_at->format('i'))*60 + intval($post->created_at->format('s')) == intval($image->created_at->format('i'))*60 + intval($image->created_at->format('s')) || ((intval($post->created_at->format('i'))*60 + intval($post->created_at->format('s')))+1) == intval($image->created_at->format('i'))*60 + intval($image->created_at->format('s')) || ((intval($post->created_at->format('i'))*60 + intval($post->created_at->format('s')))+2) == intval($image->created_at->format('i'))*60 + intval($image->created_at->format('s')))
			<p>{{ $image->file_name }}</p>
			<!-- <img src="{{ Storage::url($image->file_path) }}" style="width:100%;"/> -->
	        <img src="{{ $image -> file_path }}" style="width:100%;">
			@endif
	@endforeach
                        <a class="card-link" href="{{ route('posts.show', ['post_id' => $post]) }}">
                            続きを読む
                        </a>
                    </div>
			<div class="row justify-content-center">
			    <p>Likes:{{ $post -> users() -> count() }}</p>
			</div>
    @if ($post->users()->where('user_id', Auth::id())->exists())
                        <div class="row justify-content-around">
		                    <form action="{{ route('unlikes', $post) }}" method="POST">
@csrf
                                <input type="submit" value="&#xf164;Unlike" class="fas btn btn-danger">
                            </form>
                        </div>
    @else
                        <div class="row justify-content-around">
		                        <form action="{{ route('likes', $post) }}" method="POST">
@csrf
                                <input type="submit" value="&#xf164;Like" class="fas btn btn-success">
                            </form>
                        </div>
    @endif
                    <div class="card-footer">
                        <span class="mr-2">
                            投稿日時 {{ $post->created_at->format('Y.m.d') }}
                            投稿日時 {{ intval($post->created_at->format('s'))+1 }}
                        </span>
                        @if ($post->comments->count())
                            <span class="badge badge-primary">
                                コメント {{ $post->comments->count() }}件
                            </span>
                        @endif
                    </div>
                </div>
            </div>   

	@endforeach
    </div>
@endsection


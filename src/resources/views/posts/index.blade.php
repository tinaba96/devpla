@extends('layout')

<head>
<script src="https://kit.fontawesome.com/7c7377020a.js" crossorigin="anonymous"></script>
</head>

@section('content')
    <div class="container mt-4">
    <!-- <a href="{{ route('posts.create') }}" class="btn btn-primary">
        投稿を新規作成する
    </a> -->



    

	@foreach ($posts as $post)

 -->            <div class="col-xs-6 col-md-8">
                <div class="card mb-4">

                    <div class="card-header">
                        {{ $post->title }}
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {!! nl2br(e(Str::limit($post->body, 200))) !!} 
                        </p>
	@foreach ($images as $image)
		    @if ($post->created_at == $image->created_at)
			<p>{{ $image->file_name }}</p>
			<img src="{{ Storage::url($image->file_path) }}" style="width:100%;"/>
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
                        </span>
                    </div>
                </div>
            </div>   

	@endforeach
    </div>
@endsection


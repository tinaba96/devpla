@extends('layout')

@section('content')
    <div class="container mt-4">
    <!-- <a href="{{ route('posts.create') }}" class="btn btn-primary">
        投稿を新規作成する
    </a> -->
        @foreach ($posts as $post)
            <div class="col-xs-6 col-md-8">
                <div class="card mb-4">

                    <div class="card-header">
                        {{ $post->title }}
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {!! nl2br(e(Str::limit($post->body, 200))) !!} 
                        </p>
                        <a class="card-link" href="{{ route('posts.show', ['post_id' => $post]) }}">
                            続きを読む
                        </a>
                    </div>

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
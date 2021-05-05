@extends('layout')

<head>
<script src="https://kit.fontawesome.com/7c7377020a.js" crossorigin="anonymous"></script>
</head>

@section('content')
    <div class="container mt-4">
        <div class="border p-4 newd">
            <h1 class="h5 mb-4">
                {{ $post->title }}
            </h1>

            <div class="mb-4 text-right">
                <a class="btn btn-primary" href="{{ route('posts.edit', ['post_id' => $post]) }}">
                    編集する
                </a>
                <form
                style="display: inline-block;"
                method="POST"
                action="{{ route('posts.destroy', ['post_id' => $post]) }}"
                >
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">削除する</button>
                </form>
            </div>



            <p class="mb-5">
                {!! nl2br(e($post->body)) !!}
            </p>

            <section>
	    <div class="row justify-content-center">
                @if ($post->users()->where('user_id', Auth::id())->exists())
                    <div class="col align-self-end">
		    <form action="{{ route('unlikes', $post) }}" method="POST">
		      @csrf
		      <input type="submit" value="&#xf164;UnLike" class="fas btn btn-danger">
		    </form>
	    </div>
@else
                    <div class="col align-self-end">
		    <form action="{{ route('likes', $post) }}" method="POST">
		      @csrf
		      <input type="submit" value="&#xf164;Like" class="fas btn btn-success">
		    </form>
		    </div>
@endif


        </div>
    </div>
@endsection

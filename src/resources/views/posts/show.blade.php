@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
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
                <h2 class="h5 mb-4">
                    コメント
                </h2>
            </section>
        </div>
    </div>
@endsection
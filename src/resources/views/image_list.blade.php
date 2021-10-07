@extends('layouts.app')

@section('content')

<a class = text-white href="{{ route('posts.index') }}">投稿画面に戻る</a>
<h1 style="color:green; text-align:center;  font-size: 2.25rem;">写真一覧</h1>
<hr />

@foreach($images as $image)
<div style="width: 18rem; float:left; margin: 16px;">
	<p style='color:white;'>{{ $image->file_name }}</p>
	<!-- <img src="{{ Storage::url($image->file_path) }}" style="width:100%;"/> -->
	<img src="{{ $image -> file_path }}" style="width:100%;">
	<p style='color:white;'>投稿日時 {{ $image->created_at->format('Y.m.d') }}</p>
</div>

@endforeach

@endsection

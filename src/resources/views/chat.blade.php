@extends('layout')

@section('content')

<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class='card'>
            <div class='card-header'>
                チャット
            </div>
            <div class="card-body chat-card">

                @foreach ($chats as $item)
                @include('components.chat',['item' => $item])
                @endforeach


            </div>
        </div>
    </div>
</div>

<!-- <form method='POST' action="{{ route('add') }}">
    @csrf
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
            <textarea class="form-control" id = "comment" name = "chat" placeholder="push massage (Shift + Enter)" aria-label="With textarea" onkeydown="if(even.shiftKey&&event.KeyCode==13){document.getElementById('submit').click();return false};" ></textearea>
            <button type="submit" id='submit' class="btn btn-outline-primary comment-btn">送信</button> 
        </div>
    </div>
</form> -->
<form method="POST" action="{{route('add')}}">
    @csrf
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
            <textarea class="form-control" id="chat" name="chat" placeholder="input message" aria-label="With textarea"></textarea>
            <button type="submit" class="btn btn-outline-primary comment-btn">提出</button>
        </div>
    </div>
</form>



@endsection

@section('js')
<script src="{{ asset('js/chat.js') }}"></script>
@endsection



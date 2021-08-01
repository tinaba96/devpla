@extends('layout')

@section('content')




<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class='card'>
            <div class='card-header'>
                <h4> {{ $chatgroup->name }}  </h4>
            </div>
            <div class="card-body chat-card">
                <div id="comment-data"></div>
                @foreach ($chats as $item)
                @foreach ($members as $member)
                    @if($item->chatgroup_id == $chatgroup->id)
                        @if($member->user_id == $item->login_id)
                        @include('components.chat',['item' => $item])
                        @endif
                    @endif
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>

<form method="POST" action='/homechat/{{ $chatgroup->id }}/'>
    @csrf
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
            <textarea class="form-control" id="chat" name="chat" placeholder="メッセージを入力 (Shift+Enter)" aria-label="With textarea" onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
            <button type="submit" id="submit" class="btn btn-outline-primary comment-btn">提出</button>
        </div>
    </div>
</form>



@endsection

@section('js')
<script src="{{ asset('js/chat.js') }}"></script>
@endsection



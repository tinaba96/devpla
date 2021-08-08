@extends('layout')

@section('content')


<style>
    .top-100 {top: 100%}
    .bottom-100 {bottom: 100%}
    .max-h-select {
        max-height: 300px;
    }
</style>

<div class="container">
    <h1 style="color:green; text-align:center;">チャットメンバー</h1>
            @if (!Auth::user()->user_chatgroup()->where('chatgroup_id', $chatgroup->id)->exists() )
                <form action='/homechat/{{ $chatgroup->id }}/bemember' method='POST'>
                @csrf
                <button type='submit' class='btn btn-primary'> メンバーになる </button>
                </form>
            @endif
</div>


<div class="flex flex-col items-center">
@foreach($members as $member)
@foreach($groups as $group)
    <div class="w-full md:w-1/2 flex flex-col items-center h-10">
        <div class="w-full px-4">
            <div class="flex flex-col items-center relative">
                <div class="absolute shadow bg-white top-100 z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj">
                    <div class="flex flex-col w-full">
                        <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100">
                            <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                <div class="w-6 flex flex-col items-center">

                                    <div class="flex relative w-5 h-5 bg-orange-500 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full ">


                                        @if($group->id == $member->chatgroup_id)
                                        <img src="{{ $member->users()->first()->profile_image }}" width="48" height="48" class="rounded-full" />
                                        @endif

                                    </div>
                                </div>

                                <div class="w-full items-center flex">
                                    <div class="mx-2 -mt-1  "> {{ $member->users()->first()->name }}
                                        <div class="text-xs truncate w-full normal-case font-normal -mt-1 text-gray-500">CEO &amp; managin director</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endforeach
</div>

@endsection

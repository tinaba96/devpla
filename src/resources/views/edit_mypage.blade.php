@extends('layout')

@section('content')

<div class="container">
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
        <h2>マイページを編集</h2>
        <form method='POST' action='/mypage/edit'>
            <div class="card-vody">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <Label> スキル 
                        <input name='my_skills' type='text' class='form-control form-control-lg' value='{{ Auth::user()->my_skills }}'>
                        </label>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <Label> 興味ある分野
                        <input name='topics_interest' type='text' class='form-control form-control-lg', value='{{ Auth::user()->topics_interest }}'>
                        </label>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <Label> 学歴
                        <input name='edu_background' type='text' class='form-control form-control-lg', value='{{ Auth::user()->edu_background }}'>
                        </label>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <Label> 職歴
                        <input name='work_history' type='text' class='form-control form-control-lg', value='{{ Auth::user()->work_history }}'>
                        </label>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <Label> 業績と資格
                        <input name='achieve_quali' type='text' class='form-control form-control-lg', value='{{ Auth::user()->achieve_quali}} '>
                        </label>
                    </div>
                </div>
                @csrf
                @method('PATCH')
                <button class='btn btn-primary' type='submit'> Edit </bitton>
                </form>



   
            </div>
        </div> 
    </div>


</div>



</div>

@endsection





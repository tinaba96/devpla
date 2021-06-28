<style>
    .post-card{
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>


@extends('layout')

@section('content')

<div class="container">
    <h1 style="color:green; text-align:center;">チャットグループ作成</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <form align='right' method='POST' action='/homechat'>
                            <div class="row justify-content-center">
                                <Label align='left'>Group Name
                                <input size='50' type='text' name='name' class='form-control form-control-lg'>
                                </label>
                                @csrf
                            </div>
                            <br>
                            <button class='btn btn-primary' type='submit'>Create Chat Group</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

</div>



@endsection
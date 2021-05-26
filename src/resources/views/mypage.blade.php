@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                <h3><font color="blue">マイページ</font></h3>
                    <img width="100%" src="{{ asset('storage/profiles/'.$users->profile_image) }}" alt="profile_image">

                    <a href =  {{ url('/mypage/image/edit/') }}> 写真の編集 </a>
                
                </div>
            </div>


        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div align='right'> <a href =  {{ url('/mypage/edit/') }}> 編集 </a></div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <h4><font color="#ff9933">スキル</font></h4>
                            <div class="card">
                                <div class="card-body">
                                {{ Auth::user()->my_skills }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <h4><font color="#ff9933">興味ある分野</font></h4>
                            <div class="card">
                                <div class="card-body">
                                {{ Auth::user()->topics_interest }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <h4><font color="#ff9933">学歴</font></h4>
                            <div class="card">
                                <div class="card-body">
                                {{ Auth::user()->edu_background }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <h4><font color="#ff9933">職歴</font></h4>
                            <div class="card">
                                <div class="card-body">
                                {{ Auth::user()->work_history }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <h4><font color="#ff9933">業績と資格</font></h4>
                            <div class="card">
                                <div class="card-body">
                                {{ Auth::user()->my_skills }}
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>


    </div>



</div>



@endsection

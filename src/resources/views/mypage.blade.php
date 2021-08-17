@extends('layout')

@section('content')

<div class="bg-gray-100">
    <div class="container mx-auto p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto" src="{{ Auth::user() -> profile_image }}" alt="profile_image">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ Auth::user()->name }}</h1>

                    <div class="row justify-content-center text-sm">

                    <div class="grid grid-cols-2">
                        <div class="px-4 py-1 text-center">
                            <a href = {{ url('/users/' . Auth::user()->id . '/followers') }}>
                            {{ Auth::user()->followers()->count() }}</a>
                        </div>  
                        <div class="px-4 py-1 text-center">
                            <a href = {{ url('/users/' . Auth::user()->id . '/following') }}>
                            {{ Auth::user()->following()->count() }}</a>
                        </div>
                        <div class="px-1 py-1 font-semibold">フォロワー数 </div>
                        <div class="px-1 py-1 font-semibold">フォロー数</div>
                    </div>
                </div>


                    <!-- <h3 class="text-gray-600 font-lg text-semibold leading-6">Owner at Her Company Inc.</h3>
                    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">Lorem ipsum dolor sit amet
                        consectetur adipisicing elit.
                        Reprehenderit, eligendi dolorum sequi illum qui unde aspernatur non deserunt</p> -->
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <!-- <li class="flex items-center py-3">
                            <span>Status</span>
                            <span class="ml-auto"><span
                                    class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                        </li> -->
                        <li class="flex items-center py-3">
                            <span>利用開始日</span>
                            <span class="ml-auto">{{ Auth::user()->created_at->format('Y/m') }}</span>
                        </li>
                    </ul>
                    <div class="text-sm" >
                        <a href =  {{ url('/mypage/image/edit/') }}> 写真の編集 </a>
                    </div>
                </div>
                <!-- End of profile card -->
                <!-- <div class="my-4"></div> -->
                <!-- Friends card -->
                <!-- <div class="bg-white p-3 hover:shadow">
                    <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                        <span class="text-green-500">
                            <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                        <span>Similar Profiles</span>
                    </div>
                    <div class="grid grid-cols-3">
                        <div class="text-center my-2">
                            <img class="h-16 w-16 rounded-full mx-auto"
                                src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                alt="">
                            <a href="#" class="text-main-color">Kojstantin</a>
                        </div>
                    </div>
                </div> -->
                <!-- End of friends card -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide font-extrabold">プロフィール</span>
                        <div class="text-sm"> <a href =  {{ url('/mypage/edit/') }}> 編集 </a></div>
                    </div>
                    <div>
                        <div class="grid md:grid-cols-1 text-sm">
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">スキル</div>
                                <div class="px-4 py-2">{{ Auth::user()->my_skills }}</div>
                                <div class="px-4 py-2"></div>
                            </div>
  
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">興味のある分野</div>
                                <div class="px-4 py-2">{{ Auth::user()->topics_interest }}</div>
                                <div class="px-4 py-2"></div>
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-bold">学歴</div>
                                <div class="px-4 py-2">{{ Auth::user()->edu_background }}</div>
                                <div class="px-4 py-2"></div>
                            </div>

                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">職歴</div>
                                <div class="px-4 py-2">{{ Auth::user()->work_history }}</div>
                                <div class="px-4 py-2"></div>
                            </div>
                            <div class="grid grid-cols-3">
                                <div class="px-4 py-2 font-semibold">業績と資格</div>
                                <div class="px-4 py-2">{{ Auth::user()->topics_interest }}</div>
                                <div class="px-4 py-2"></div>
                            </div>
                        </div>
                    </div>


                    <!-- <button
                        class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Show
                        Full Information</button> -->
                </div>
                <div class = "p-2 text-sm text-right">
                        <a href =  {{ url('user/delete') }}> 退会予定の方はこちら </a>
                </div>   
                <!-- End of about section -->

                <!-- <div class="my-4"></div> -->

                <!-- Experience and education -->
                <!-- <div class="bg-white p-3 shadow-sm rounded-sm">

                    <div class="grid grid-cols-2">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">プログラミング経験</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                    <div class="text-teal-600">Owner at Her Company Inc.</div>
                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path fill="#fff"
                                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                </span>  -->
                                <!-- <span class="tracking-wide">Education</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                    <div class="text-teal-600">Masters Degree in Oxford</div>
                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    End of Experience and education grid
                </div> -->

                <!-- End of profile tab -->
            </div>

        </div>
    </div>
</div>

@endsection

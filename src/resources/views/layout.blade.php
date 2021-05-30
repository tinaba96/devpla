<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevPla</title>

    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"
    >
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <link href="simplemde-with-emoji-picker-main/unicode-emoji-picker/css/emoji.css" rel="stylesheet">
    <style>
        .editor-toolbar:hover {
            opacity: unset !important;
        }

        .editor-toolbar {
            opacity: 1;
        }

        .emoji-menu {
            top: 100%;
        }

        @media only screen and (max-width: 768px) {
            .emoji-menu {
                left: 20px !important;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('') }}">
                DevPla
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            @auth
                                <a href="/post" class="btn2">新規投稿</a>
                            @endauth
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                                <a class="nav-link" href="{{ route('image_list') }}">写真一覧</a>
                                <a class="nav-link" href="{{ route('users_list') }}">ユーザ一覧</a>
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Home') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('mypage') }}">
                                        {{ __('MyPage') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class ="d">
        @yield('content')
    </div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<script src="simplemde-with-emoji-picker-main/unicode-emoji-picker/js/config.js"></script>
<script src="simplemde-with-emoji-picker-main/unicode-emoji-picker/js/emoji-picker.js"></script>

<script>
    var simplemde = new SimpleMDE({
        element: document.getElementById("simplemde"),
        spellChecker: false,
        toolbar: ["bold", "italic", "heading", "|", "code", "quote", "link", "|", "unordered-list", "ordered-list", "table", "|", "preview", "side-by-side", "fullscreen", '|',
            {
                name: "emojiable",
                action: function customFunction(editor) {
                    $.triggerEmojiMenu()
                },
                className: "fa fa-smile-o",
                title: "Emoji",
            }]
    });


    $(function () {
        window.emojiPicker = new EmojiPicker({
            assetsPath: 'simplemde-with-emoji-picker-main/unicode-emoji-picker/img/',
            triggerButton: $("#openEmoji"),
            emojiMenuPlace: $(".editor-toolbar"),
            dontHideOnClick: 'fa-smile-o',
            emojiResult: function (res) {
                var pos = simplemde.codemirror.getCursor();
                simplemde.codemirror.setSelection(pos, pos);
                simplemde.codemirror.replaceSelection(res.unicode);
            }
        });
        window.emojiPicker.discover();

        $('.emoji-menu').css('left', $("[title='Emoji']").offset().left - 20);
    });

</script>
    <script>
        var simpleMDE = new SimpleMDE({element: document.getElementById('editor')});
    </script>
    @if(Auth::check())
    <script>
        document.getElementById('logout').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
        });
    </script>
    @endif
    @yield('scripts')
</body>
</html>

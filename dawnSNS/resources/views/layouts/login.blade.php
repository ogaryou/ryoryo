
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/serch.css')}}">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <script src="https://kit.fontawesome.com/ed36208e44.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        
        <div id = "head">
        <h1><a href="/top"><img src="{{asset('images/main_logo.png')}}" ></a></h1>
            <div id="top-header">
                <div id="top-link-header">
                    <p class="name">{{$username->username}}さん</p>
                    <img src="{{asset('images/dawn.png')}}" class="main-image">
                </div>
                <div class="drop-menu">
                <ul class="top-menu-header">
                    <li><a href="/top" class="top-link">ホーム</a></li>
                    <li><a href="/profile/{{$username->id}}/update-form" class="top-link">プロフィール</a></li>
                    <li><a href="/logout" class="top-link">ログアウト</a></li>
                </ul>  
            </div>
            </div>

        </div>
    </header>

    <div id="row">
        <div id="container">
            @yield('content')
            @yield('post')
        </div >
        <div id="side-bar">
            <div id="confirms">
                <p class="p-font">{{$username->username}}さんの</p>
                <div class="follow-count">
                <p class="p-font">フォロー数</p>
                <p class="p-font">{{$count}}名</p>
                </div>
                <p class="btn1"><a href="/follow-list" class="btn-link">フォローリスト</a></p>
                <div class="follow-count">
                <p class="p-font">フォロワー数</p>
                <p class="p-font">{{$counts}}名</p>
                </div>
                <p class="btn1"><a href="/follower-list" class="btn-link">フォロワーリスト</a></p>
            </div>
            <p class="btn2"><a href="/search" class="btn-link">ユーザー検索</a></p>
        </div>    
    </div>
    <footer>
    </footer>
     <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/top.js')}}"></script>
</body>
</html>


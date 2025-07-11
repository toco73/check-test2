<!DOCTYPE html>
<html lang="ja">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>基礎学習ターム 確認テスト_もぎたて</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
</head>

<body>
    <div class="app">
        <header class="header">
            <h1 class="header__heading">
                <a class="header__heading-logo"
                href="/products">Mogitate</a>
            </h1>
        </header>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>

</html>
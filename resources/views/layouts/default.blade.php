<html>
<head>
    <title>@yield('title', 'weibo app') - laravel入门</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">weibo</a>
        <ui class="navbar-nav justify-content-end">
            <li class="nav-item"><a href="/help">帮助</a></li>
            <li class="nav-item"><a href="/login">登录</a></li>
        </ui>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>
</body>
</html>

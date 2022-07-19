<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href=""><img src="/storage/image/log_1.jpeg" style="width: 5rem;" alt="">スノーボード</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="{{ route('snows') }}">投稿一覧 <span class="sr-only"></span></a>
            <!-- <a class="nav-item nav-link" href="{{ route('create') }}">投稿</a> -->
        </div>
    </div>
    <div class="header_item">
            <ul>
                <li><a href="{{ route('login') }}">ログイン</a></li>
                <li><a href="{{ route('register') }}">新規登録</a></li>
            </ul>
    </div>
</nav>
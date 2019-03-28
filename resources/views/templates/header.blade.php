<header>
    <a href="{{ route('plan.index')}}"><h1>Tryout</h1></a>
    <p>ポートフォリオ作成のための企画集</p>
    <div class="about">
        <a href="{{ route('about') }}">このサイトについて</a>
    </div>
    <nav>
        <ul>
        @isset ($user)
            @if ($user->id == 1)
            <li><a href="{{ route('skill.index') }}">Skill一覧へ</a></li>
            @endif
            <li><a href="{{ route('plan.create') }}">投稿</a></li>
            <li><a href="{{ route('user.show') }}">ユーザーページ</a></li>
            <br>
            <li><a href="{{ route('twitter.logout') }}">...ログアウト</a></li>
        @else
            <li><a href="{{ route('user.invite') }}">ログインについて</a><li>
            <li><a href="{{ route('twitter.login')}}">Twitterアカウントでログイン</a></li>
        @endisset
        </ul>
    </nav>
</header>
<header>
<h1><a href="{{ route('plan.index')}}">Tryout</a></h1>
<nav>
@isset ($user)
@if ($user->id == 1)
<p><a href="{{ route('skill.index') }}">Skill一覧へ</a></p>
@endif
<p><a href="{{ route('plan.create') }}">投稿</a></p>
<p><a href="{{ route('user.show') }}">ユーザーページ</a></p>
<br>
<p><a href="{{ route('twitter.logout') }}">ログアウト</a></p>
@else
<p><a href="{{ route('user.invite') }}">ログインについて</a><p>
<p><a href="{{ route('twitter.login')}}">Twitterアカウントでログイン</a></p>
@endisset
</nav>
<p>ポートフォリオ作成のための企画集</p>
<div class="about">
    <a href="{{ route('about') }}">このサイトについて</a>
</div>
</header>
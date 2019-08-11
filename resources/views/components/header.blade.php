<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ route('articles.news', ['category' => 'technology'])}}"><h3 class="my-0">Trend × Tech</h3></a>
  <ul class="navbar-nav flex-row">
    @if(Auth::check())
    <li class="nav-item text-light ml-3"><a class="nav-link">ようこそ{{ Auth::user()->name }}さん</a></li>
    <li class="nav-item ml-3"><a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a></li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
    </form>
    @else
      <li class="nav-item"><a class="nav-link" href="{{route('about')}}">このサイトについて</a></li>
      <li class="nav-item ml-3"><a class="nav-link" href="{{route('login')}}">ログイン</a></li>
      <li class="nav-item ml-3"><a class="nav-link" href="{{route('register')}}">新規登録</a></li>
    @endif
  </ul>
</nav>

<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ route('articles.news', ['category' => 'technology'])}}"><h3 class="my-0">NewsApp</h3></a>
  <ul class="navbar-nav flex-row">
    @if(Auth::check())
      <li class="nav-item text-light"><a class="nav-link">ようこそ{{ Auth::user()->name }}さん</a></li>
      <li class="nav-item ml-3"><a class="nav-link" href="#">ログアウト</a></li>
    @else
      <li class="nav-item"><a class="nav-link" href="{{route('login')}}">ログイン</a></li>
      <li class="nav-item ml-3"><a class="nav-link" href="{{route('register')}}">新規登録</a></li>
    @endif
  </ul>
</nav>

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-0">
  <button class="navbar-toggler mr-0 ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav w-100 nav-justified font-weight-bold">
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/technology')}}" href="{{ route('articles.news', ['category' => 'technology'])}}">技術</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/business')}}" href="{{ route('articles.news', ['category' => 'business'])}}">ビジネス</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/science')}}" href="{{ route('articles.news', ['category' => 'science'])}}">科学</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/qiita')}}" href="{{ route('articles.qiita')}}">Qiita</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/hacker-news')}}" href="{{ route('articles.news', ['category' => 'hacker-news'])}}">Hacker news</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/mashable')}}" href="{{ route('articles.news', ['category' => 'mashable'])}}">Mashable</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/techcrunch')}}" href="{{ route('articles.news', ['category' => 'techcrunch'])}}">TechCrunch</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/the-verge')}}" href="{{ route('articles.news', ['category' => 'the-verge'])}}">The verge</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/techradar')}}" href="{{ route('articles.news', ['category' => 'techradar'])}}">Techradar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/wired')}}" href="{{ route('articles.news', ['category' => 'wired'])}}">Wired</a>
      </li>
    </ul>
  </div>
</nav>

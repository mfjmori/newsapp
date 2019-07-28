<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-0">
  <button class="navbar-toggler mr-0 ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav w-100 nav-justified font-weight-bold">
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive(route('articles.news', ['category' => 'technology']))}}" href="{{ route('articles.news', ['category' => 'technology'])}}">技術</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive(route('articles.news', ['category' => 'business']))}}" href="{{ route('articles.news', ['category' => 'business'])}}">ビジネス</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive(route('articles.news', ['category' => 'science']))}}" href="{{ route('articles.news', ['category' => 'science'])}}">科学</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive(route('articles.qiita'))}}" href="{{ route('articles.qiita')}}">Qiita</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive(route('articles.news', ['category' => 'hacker-news']))}}" href="{{ route('articles.news', ['category' => 'hacker-news'])}}">Hacker news</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive(route('articles.news', ['category' => 'mashable']))}}" href="{{ route('articles.news', ['category' => 'mashable'])}}">Mashable</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive(route('articles.news', ['category' => 'techcrunch']))}}" href="{{ route('articles.news', ['category' => 'techcrunch'])}}">TechCrunch</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive(route('articles.news', ['category' => 'the-verge']))}}" href="{{ route('articles.news', ['category' => 'the-verge'])}}">The verge</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive(route('articles.news', ['category' => 'techradar']))}}" href="{{ route('articles.news', ['category' => 'techradar'])}}">Techradar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive(route('articles.news', ['category' => 'wired']))}}" href="{{ route('articles.news', ['category' => 'wired'])}}">Wired</a>
      </li>
      @if (Auth::check())
        <li class="nav-item">
          <a class="nav-link {{Helper::addActive(route('stocks.index'))}}" href="{{ route('stocks.index')}}">ストック</a>
        </li>
      @endif
    </ul>
  </div>
</nav>

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-0">
  <button class="navbar-toggler mr-0 ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav w-100 nav-justified font-weight-bold">
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('')}}" href="{{ route('articles.index')}}">総合</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/business')}}" href="{{ route('articles.index', ['category' => 'business'])}}">ビジネス</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/entertainment')}}" href="{{ route('articles.index', ['category' => 'entertainment'])}}">エンタメ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/health')}}" href="{{ route('articles.index', ['category' => 'health'])}}">美容・健康</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/science')}}" href="{{ route('articles.index', ['category' => 'science'])}}">科学</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/sports')}}" href="{{ route('articles.index', ['category' => 'sports'])}}">スポーツ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Helper::addActive('/technology')}}" href="{{ route('articles.index', ['category' => 'technology'])}}">技術</a>
      </li>
    </ul>
  </div>
</nav>

@extends('layouts.app_articles')

@section('content')
<div class="container articles-container">
  @if ($contents)
    @foreach ($contents->articles as $article)
      <a href="{{$article->url}}" class="show-detail text-dark" target="_blank">
        <div class="card my-3">
          <div class="row no-gutters">
            <div class="img-box col-md-4">
              <img src="{{$article->urlToImage}}" class="card-img-top">
            </div>
            <div class="main-box col-md-8">
              <div class="card-body">
                <div class="card-body-main">
                  <h5 class="card-title font-weight-bold">{{$article->title}}</h5>
                  <p class="card-text">{{$article->description}}</p>
                </div>
                <p class="card-body-sub">
                  <span class="card-source text-muted mr-2">{{$article->source->name}}</span><span class="card-date text-muted">{{ date("Y/m/d H:i",strtotime($article->publishedAt))}}</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </a>
    @endforeach
  @endif
</div>
<div class="container articles-container">
</div>
@endsection

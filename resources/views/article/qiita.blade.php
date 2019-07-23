@extends('layouts.app_articles')

@section('content')
<div class="container articles-container">
  @if ($contents)
    @foreach ($contents as $article)
      <a href="{{$article->url}}" class="show-detail text-dark" target="_blank">
        <div class="card my-3">
          <div class="row no-gutters">
            <div class="img-box qiita col-md-4">
              <img src="https://pbs.twimg.com/card_img/1151716605514178562/qTfQSqKS?format=png&name=240x240" class="card-img-top">
            </div>
            <div class="main-box qiita col-md-8">
              <div class="card-body">
                <div class="card-body-main">
                  <h4 class="card-title font-weight-bold">{{$article->title}}</h4>
                  <p class="card-text">{{$article->body}}</p>
                </div>
                <p class="card-body-sub">
                  <span class="card-source text-muted mr-2">{{'@'}}{{$article->user->id}}</span>
                  <span class="card-date text-muted">{{ date("Y/m/d",strtotime($article->created_at))}}</span>
                  <span class="card-like text-muted"> いいね数 {{ $article->likes_count }}</span>
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

@extends('layouts.app_articles')

@section('content')
  <div class="container articles-container">
    @if ($contents)
      @foreach ($contents->articles as $article)
        <div class="card my-3">
          <div class="row no-gutters">
            <div class="img-box col-md-4">
              <img src="{{$article->urlToImage}}" class="card-img-top">
            </div>
            <div class="main-box col-md-8">
              <div class="card-body">
                <div class="card-body-main">
                  <h4 class="card-title font-weight-bold">{{$article->title}}</h4>
                  <p class="card-text">{{$article->description}}</p>
                </div>
                <div class="card-body-sub d-flex justify-content-between align-items-end">
                  <div class="card-info">
                    <span class="card-source text-muted mr-2">{{$article->source->name}}</span><span class="card-date text-muted">{{ date("Y/m/d H:i",strtotime($article->publishedAt))}}</span>
                  </div>
                  <div class="card-buttons">
                    {{-- <button type="button" class="btn btn-outline-success">後で読む</button> --}}
                    <a type="submit" target="_blank" href="{{$article->url}}" class="btn btn-outline-primary ml-1">続きを読む</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    @endif
  </div>
@endsection

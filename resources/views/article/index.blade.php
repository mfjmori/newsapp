@extends('layouts.app_articles')

@section('content')
  <div class="container articles-container">
    @if (count($errors) > 0)
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>  
    @endif
    @if ($articles)
      @foreach ($articles as $article)
        <div class="card my-3">
          <div class="row no-gutters">
            <div class="img-box col-md-4">
              <img src="{{isset($article->urlToImage) ? $article->urlToImage : 'https://pbs.twimg.com/card_img/1154051843481194496/XozAi0UL?format=png&name=240x240'}}" class="card-img-top">
            </div>
            <div class="main-box col-md-8">
              <div class="card-body">
                <div class="card-body-main">
                  <h4 class="card-title font-weight-bold">{{$article->title}}</h4>
                  <p class="card-text">{{isset($article->description) ? $article->description : $article->body}}</p>
                </div>
                <div class="card-body-sub d-flex justify-content-between align-items-end">
                  <div class="card-info col-5 px-0">
                    <span class="card-source text-muted text-truncate mr-2">{{isset($article->source->name) ? $article->source->name : "qiita"}}</span>
                    <span class="card-date text-muted">{{ isset($article->publishedAt) ? date("Y/m/d",strtotime($article->publishedAt)) : date("Y/m/d",strtotime($article->created_at))}}</span>
                    @if (isset($article->likes_count))
                    <span class="card-like text-muted ml-2"><i class="fas fa-thumbs-up"></i> {{ $article->likes_count }}</span>
                    @endif
                  </div>
                  <div class="card-buttons">
                    @if (Auth::check())
                      @if (in_array($article->url, $urls))
                        <button type="button" disabled class="form-submit btn btn-outline-secondary"><i class="fas fa-check mr-1"></i>ストック中</button>
                      @else
                        <button type="submit" form="form-{{ $loop->index }}" class="btn btn-outline-success"><i class="fas fa-star mr-1"></i>後で読む</button>
                      @endif
                    @endif
                    <a target="_blank" href="{{$article->url}}" class="btn btn-outline-primary ml-1">続きを読む</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @if (Auth::check())
          <form action="{{ route('stocks.store') }}" method="post" class="article-form" id="form-{{ $loop->index }}">
            @csrf
            <input type="hidden" readonly="true" name="url" value="{{ $article->url }}">
            <input type="hidden" readonly="true" name="image_url" value="{{ isset($article->urlToImage) ? $article->urlToImage : 'https://pbs.twimg.com/card_img/1154051843481194496/XozAi0UL?format=png&name=240x240' }}">
            <input type="hidden" readonly="true" name="title" value="{{ $article->title }}">
            <input type="hidden" readonly="true" name="body" value="{{ isset($article->description) ? $article->description : $article->body }}">
            <input type="hidden" readonly="true" name="source" value="{{ isset($article->source->name) ? $article->source->name : "qiita" }}">
            @if (isset($article->likes_count))
              <input type="hidden" readonly="true" name="likes_count" value="{{ $article->likes_count }}">
            @endif
            <input type="hidden" readonly="true" name="published_at" value="{{ isset($article->publishedAt) ? date("Y/m/d",strtotime($article->publishedAt)) : date("Y/m/d",strtotime($article->created_at)) }}">
          </form>
        @endif
      @endforeach
    @endif
  </div>
@endsection

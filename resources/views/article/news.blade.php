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
      @foreach ($articles->articles as $article)
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
                  <div class="card-info col-5 px-0">
                    <span class="card-source text-muted text-truncate mr-2">{{$article->source->name}}</span><span class="card-date text-muted">{{ date("Y/m/d",strtotime($article->publishedAt))}}</span>
                  </div>
                  <div class="card-buttons">
                    @if (Auth::check())
                      @if (in_array($article->url, $urls))
                        <button type="button" disabled class="btn btn-outline-secondary"><i class="fas fa-check mr-1"></i>ストック中</button>
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
          <form action="{{ route('stocks.store') }}" method="post" id="form-{{ $loop->index }}">
            @csrf
            <input type="hidden" readonly="true" name="url" value="{{ $article->url }}">
            <input type="hidden" readonly="true" name="image_url" value="{{ $article->urlToImage }}">
            <input type="hidden" readonly="true" name="title" value="{{ $article->title }}">
            <input type="hidden" readonly="true" name="body" value="{{ $article->description }}">
            <input type="hidden" readonly="true" name="source" value="{{ $article->source->name }}">
            <input type="hidden" readonly="true" name="published_at" value="{{ date("Y/m/d H:i", strtotime($article->publishedAt)) }}">
          </form>
        @endif
      @endforeach
    @endif
  </div>
@endsection

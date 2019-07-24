@extends('layouts.app_articles')

@section('content')
  <div class="container articles-container">
    @if ($articles)
      @foreach ($articles as $article)
        <div class="card my-3">
          <div class="row no-gutters">
            <div class="img-box col-md-4">
              <img src="{{$article->image_url}}" class="card-img-top">
            </div>
            <div class="main-box col-md-8">
              <div class="card-body">
                <div class="card-body-main">
                  <h4 class="card-title font-weight-bold">{{$article->title}}</h4>
                  <p class="card-text">{{$article->body}}</p>
                </div>
                <div class="card-body-sub d-flex justify-content-between align-items-end">
                  <div class="card-info">
                    @if ($article->source)
                      <span class="card-source text-muted mr-2">{{$article->source}}</span><span class="card-date text-muted">{{ date("Y/m/d H:i",strtotime($article->published_at))}}</span>
                    @elseif($article->likes_count)
                      <span class="card-date text-muted">{{ date("Y/m/d H:i",strtotime($article->published_at))}}</span><span class="card-like text-muted ml-2"><i class="fas fa-thumbs-up"></i> {{ $article->likes_count }}</span>
                    @endif
                  </div>
                  <div class="card-buttons">
                    <button type="submit" form="form-{{ $article->id }}" class="btn btn-outline-danger">削除する</button>
                    <a type="submit" target="_blank" href="{{$article->url}}" class="btn btn-outline-primary ml-1">続きを読む</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <form id="form-{{ $article->id }}" action="{{route('stocks.destroy', ['id' => $article->id])}}" method="post">
          @csrf
          @method('DELETE')
        </form>
      @endforeach
    @endif
  </div>
@endsection

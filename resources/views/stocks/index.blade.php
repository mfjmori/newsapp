@extends('layouts.app_articles')

@section('content')
  <div class="container articles-container">
    @if ($articles)
      @foreach ($articles as $article)
        <div class="card my-3" id="article-{{ $article->id }}">
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
                  <div class="card-info col-5 px-0">
                    <span class="card-source text-muted mr-2">{{$article->source}}</span><span class="card-date text-muted mr-2">{{ date("Y/m/d",strtotime($article->published_at))}}</span>
                    @if($article->likes_count)
                      <span class="card-like text-muted"><i class="fas fa-thumbs-up"></i> {{ $article->likes_count }}</span>
                    @endif
                  </div>
                  <div class="card-buttons">
                    <button type="submit" data-article-id="{{ $article->id }}" class="btn btn-outline-danger delete-button"><i class="fas fa-trash-alt mr-1"></i>削除する</button>
                    <a target="_blank" href="{{$article->url}}" class="btn btn-outline-primary ml-1">続きを読む</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- <form id="form-{{ $article->id }}" action="{{route('stocks.destroy', ['id' => $article->id])}}" method="post">
          @csrf
          @method('DELETE')
        </form> --}}
      @endforeach
    @endif
  </div>
@endsection

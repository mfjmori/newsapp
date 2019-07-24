@extends('layouts.app_articles')

@section('content')
<div class="container articles-container">
  @if ($contents)
    @foreach ($contents as $article)
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
              <div class="card-body-sub d-flex justify-content-between align-items-end">
                <div class="card-info">
                  <span class="card-date text-muted mr-2">{{ date("Y/m/d",strtotime($article->created_at))}}</span>
                  <span class="card-like text-muted"><i class="fas fa-thumbs-up"></i> {{ $article->likes_count }}</span>
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
<div class="container articles-container">
</div>
@endsection

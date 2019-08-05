@extends('layouts.app_articles')

@section('content')
  <div class="container">
    <div class="row mt-5">
      <h1 class="col-12">Trend × Techへようこそ!!</h1>
      <p class="col-12">このサイトでは最新の技術系記事を閲覧することができます</p>
    </div>
    <div class="row mt-4">
      <h2 class="col-12">News Apiを使った記事の閲覧</h2>
    </div>
    <div class="row">
      <h4 class="col-12">カテゴリー別</h4>
    </div>
    <div class="row">
      <ul>
        <li class="col-12">技術</li>
        <li class="col-12">ビジネス</li>
        <li class="col-12">科学</li>
      </ul>
    </div>
    <div class="row">
      <h4 class="col-12">ソース別</h4>
    </div>
    <div  class="row">
      <ul>
        <li class="col-12">Hacker news</li>
        <li class="col-12">Mashable</li>
        <li class="col-12">TechCrunch</li>
        <li class="col-12">The verge</li>
        <li class="col-12">Techradar</li>
        <li class="col-12">Wired</li>
      </ul>
    </div>
    <div class="row mt-4">
      <h2 class="col-12">Qiita Apiを使った記事の閲覧</h2>
    </div>
    <div class="row">
      <h4 class="col-12">人気記事一覧</h4>
    </div>
    <div class="row">
      <ul>
        <li class="col-12">過去１週間に投稿され、２０以上ストックされた記事を表示します</li>
      </ul>
    </div>
    <div class="row">
      <h4 class="col-12">オススメ記事一覧</h4>
    </div>
    <div class="row">
      <ul>
        <li class="col-12">あなたへのオススメ記事を表示します</li>
        <li class="col-12">続きを見るをクリックした記事のタグを使って、よく見ているタグの記事を検索して表示します</li>
        <li class="col-12">未閲覧の記事のみをオススメとして表示します。（最近閲覧した記事は表示されません）</li>
        <li class="col-12">Cookieを使用しているため、ユーザー登録をしなくてもオススメ記事が表示されます</li>
      </ul>
    </div>
    <div class="row mt-4">
      <h2 class="col-12">記事のストック</h2>
    </div>
    <div class="row">
      <ul>
        <li class="col-12">ユーザー登録をすると「後で見る」ボタンが追加され、記事をストックすることができます</li>
        <li class="col-12">ストックした記事があるとヘッダーに「ストック」表示され、ストックした記事一覧が表示されます</li>
        <li class="col-12">ストックした記事は「削除」ボタンから削除することができます</li>
      </ul>
    </div>
  </div>

@endsection
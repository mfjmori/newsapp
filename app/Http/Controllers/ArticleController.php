<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function news(ArticleRequest $request)
  {
    $newsApiKey =  env('NEWS_API_KEY');
    $isCategory = in_array($request->category, ['business', 'science', 'technology','']);
    if ($isCategory) {
      $category = $request->category;
      $url = 'https://newsapi.org/v2/top-headlines?'.'country=jp&'.'category='.$category.'&apiKey='.$newsApiKey;
    } else {
      $source = $request->category;
      $url = 'https://newsapi.org/v2/everything?'.'sources='.$source.'&apiKey='.$newsApiKey;
    }
    $json = file_get_contents($url, false, null);
    if ($json) {
      $articles = json_decode($json, true)['articles'];
      $articles = self::changeKeyNameNews($articles);
    } else {
      $articles = null;
    }
      return view('article.index', ['articles' => $articles]);
  }
  
  public function qiita(Request $request)
  {
    $date1WeekAgo = date("Y-m-d",strtotime("-1 week"));
    $url = "https://qiita.com/api/v2/items?page=1&per_page=30&query=stocks:>40+created:>=${date1WeekAgo}";
    $json = file_get_contents($url, false, null);
    if ($json) {
      $articles = json_decode($json, true);
      $articles = self::changeKeyNameQiita($articles);
    } else {
      $articles = null;
    }
      return view('article.index', ['articles' => $articles]);
  }
  
  private function changeKeyNameNews($articles) {
    $newArticles = [];
    foreach ($articles as $article) {
      if(isset($article['url']) && isset($article['title']) && isset($article['description']) && isset($article['source']['name']) && isset($article['publishedAt']) ) {
        $url = $article['url'];
        $title = $article['title'];
        $body = $article['description'];
        $source = $article['source']['name'];
        $published_at = $article['publishedAt'];
        isset($article['urlToImage']) ? $image_url = $article['urlToImage'] : $image_url = null;
        $newArticle = array(array('url' => $url, 'title' => $title, 'body' => $body, 'source' => $source, 'published_at' => $published_at, 'image_url' => $image_url));
        $newArticles = array_merge($newArticles, $newArticle);
      }
    }
    return json_decode(json_encode($newArticles));
  }

  private function changeKeyNameQiita($articles) {
    $newArticles = [];
    foreach ($articles as $article) {
      if(isset($article['url']) && isset($article['title']) && isset($article['body']) && isset($article['created_at']) && isset($article['likes_count']) ) {
        $url = $article['url'];
        $title = $article['title'];
        $body = $article['body'];
        $source = 'qiita';
        $likes_count = $article['likes_count'];
        $published_at = $article['created_at'];
        $image_url = 'https://pbs.twimg.com/card_img/1154051843481194496/XozAi0UL?format=png&name=240x240';
        $newArticle = array(array('url' => $url, 'title' => $title, 'body' => $body, 'source' => $source, 'likes_count' => $likes_count , 'published_at' => $published_at, 'image_url' => $image_url));
        $newArticles = array_merge($newArticles, $newArticle);
      }
    }
    return json_decode(json_encode($newArticles));
  }
  
}

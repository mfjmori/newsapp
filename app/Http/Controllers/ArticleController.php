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
    $json = self::getApiResult($url);
    $json ? $articles = self::changeKeyNameNews($json['articles']) : $articles = null;
      return view('article.index', ['articles' => $articles]);
  }
  
  public function qiita()
  {
    $date1WeekAgo = date("Y-m-d",strtotime("-1 week"));
    $url = "https://qiita.com/api/v2/items?page=1&per_page=20&query=stocks:>20+created:>=${date1WeekAgo}";
    $json = self::getApiResult($url);
    $json ? $articles = self::changeKeyNameQiita($json) : $articles = null;
    return view('article.index', ['articles' => $articles]);
  }

  public function recommend()
  {
    if (isset($_COOKIE["tags-history"]) && $_COOKIE["id-history"]) {
      $tagsHistory = json_decode($_COOKIE["tags-history"], true);
      $idHistory = json_decode($_COOKIE["id-history"], true);
      $countValue = array_count_values($tagsHistory);
      arsort($countValue);
      $searchTags = array_keys(array_slice($countValue, 0, 4));
      $url = self::setUrl($searchTags);
      $json = self::getApiResult($url);
      if ($json) {
        $articles = self::removeAlreadyRead($json ,$idHistory);
        $articles = self::changeKeyNameQiita($articles);
      }
    }
    $articles = $articles ?? null;
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
        $tags = array_map(function ($tag) { return $tag['name'];}, $article['tags']);
        $id = $article['id'];
        $newArticle = array(array('url' => $url, 'title' => $title, 'body' => $body, 'source' => $source, 'likes_count' => $likes_count , 'published_at' => $published_at, 'image_url' => $image_url, 'tags' => $tags, 'id' => $id));
        $newArticles = array_merge($newArticles, $newArticle);
      }
    }
    return json_decode(json_encode($newArticles));
  }

  private function setUrl($searchTags) {
    $date1MonthAgo = date("Y-m-d",strtotime("-1 month"));
    $base = 'https://qiita.com/api/v2/items';
    $pageSet = '?page=1&per_page=50';
    $queryStart = '&query=tag:';
    $query = '';
    foreach($searchTags as $key => $val) {
      $query .= "${val}+stocks:>20+created:>=${date1MonthAgo}";
      $firstKey = array_key_last($searchTags);
      if ($key != $firstKey){
        $query .= '%20OR%20';
      }
    }
    $url = $base.$pageSet.$queryStart.$query;
    return $url;
  }

  private function getApiResult($url) {
    $context = stream_context_create([ "http" => [ "ignore_errors" => true ] ]);
    $json = file_get_contents($url, false, $context);
    preg_match("/[0-9]{3}/", $http_response_header[0], $stcode);
    if ($stcode[0] == 200) {
      $json = json_decode($json, true);
      return $json;
    } else {
      return false;
    }
  }

  private function removeAlreadyRead($articles ,$idHistory) {
    $newArticles = [];
    foreach ($articles as $article) {
      if (in_array($article['id'], $idHistory, true) == false) {
        array_push($newArticles, $article);;
      }
    }
    return array_slice($newArticles, 0, 20);
  }
}

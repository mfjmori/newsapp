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
        $articles = json_decode($json);
      }
      $articles = $articles ? $articles : null;
      if (Auth::check()) {
        $urls = Auth::user()->stocks->pluck('url')->all();
        return view('article.news', ['articles' => $articles, 'urls' => $urls]);
      } else {
        return view('article.news', ['articles' => $articles]);
      }
    }

    public function qiita(Request $request)
    {
      $date1WeekAgo = date("Y-m-d",strtotime("-1 week"));
      $url = "https://qiita.com/api/v2/items?page=1&per_page=30&query=stocks:>40+created:>=${date1WeekAgo}";
      $json = file_get_contents($url, false, null);
      if ($json) {
        $articles = json_decode($json);
      }
      $articles = isset($articles) ? $articles : null;
      if (Auth::check()) {
        $urls = Auth::user()->stocks->pluck('url')->all();
        return view('article.qiita', ['articles' => $articles, 'urls' => $urls]);
      } else {
        return view('article.qiita', ['articles' => $articles]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

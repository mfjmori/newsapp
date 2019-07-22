<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ArticleRequest $request)
    {
      $newsApiKey =  env('NEWS_API_KEY');
      $category = $request->category;
      $categoryArray = ['business', 'science', 'technology',''];
      $include = in_array($category, $categoryArray);
      if ($include) {
        $url = 'https://newsapi.org/v2/top-headlines?'.'country=jp&'.'category='.$category.'&apiKey='.$newsApiKey;
      } else {
        $url = 'https://newsapi.org/v2/everything?'.'sources='.$category.'&apiKey='.$newsApiKey;
      }
      $json = file_get_contents($url, false, null);
      if ($json) {
        $contents = json_decode($json);
      }
      $contents = $contents ? $contents : null;
      return view('article.index', ['contents' => $contents]);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Stock;
use App\Http\Requests\StockRequest;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $stocks = Stock::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
      return  view('stocks.index', ['articles' => $stocks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockRequest $request)
    {
      $form = $request->all();
      unset($form['_token']);
      $saved = Stock::create($form);
      if($saved) {
        return response()->json(['code' => 201,]);
      } else {
        return response()->json(['code' => 400,]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $article = Stock::find($id);
      if ($article->user->id == Auth::id()) {
        $article->delete();
      }
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'user_id' => 'required',
          'url' => 'required|active_url',
          'title' => 'required',
          'published_at' => 'required|date',
          'likes_count' => 'integer'
        ];
    }

    public function all($keys = null)
    {
      if (Auth::check()) {
        return array_merge($this->request->all(), [
            'user_id' => Auth::id(),
        ]);
      }
    }
}

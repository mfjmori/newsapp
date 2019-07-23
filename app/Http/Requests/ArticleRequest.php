<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class ArticleRequest extends FormRequest
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
          'category' => 'in:business,science,technology,techcrunch,mashable,the-verge,techradar,wired,hacker-news,qiita',
        ];
    }

    protected function validationData()
    {
        return array_merge($this->request->all(), [
            'category' => $this->category,
        ]);
    }
}

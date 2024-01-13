<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadEditRequest extends FormRequest
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
            'shop' => 'required|string',
            'area' => 'required',
            'genre' => 'required',
            'content' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'shop.required' => '店名を入れてください',
            'shop.string' => '店名を文字列で入れてください',
            'area.required' => 'エリアを選択してください',
            'genre.required' => 'ジャンルを選択してください',
            'content.required' => '詳細を入れてください',
        ];
    }
}

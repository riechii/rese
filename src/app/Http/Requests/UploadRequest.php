<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            'content' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'shop.required' => '店名を入れてください',
            'shop.string' => '店名を文字列で入れてください',
            'area_id.required' => 'エリアを選択してください',
            'genre_id.required' => 'ジャンルを選択してください',
            'image.max' => 'アップロードされた画像は1MB以下である必要があります。',
            'content.required' => '詳細を入れてください',
        ];
    }
}

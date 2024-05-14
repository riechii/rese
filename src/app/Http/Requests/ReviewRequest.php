<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'comment' => 'nullable|max:400',
            'image' => 'nullable|image|mimes:jpeg,png',
        ];
    }

    public function withValidator($validator)
    {
        $validator->addExtension('image_extension', function ($attribute, $value, $parameters) {
            $extension = $value->getClientOriginalExtension();
            return in_array(strtolower($extension), ['jpeg', 'png']);
        });

        $validator->sometimes('image', 'image_extension', function ($input) {
            return $input->hasFile('image');
        });
    }

    public function messages()
    {
        return [
            'comment.max' => '文字数は最高400字までです。',
            'image.image_extension' => 'jpeg、pngのみアップロード可能です。',
        ];
    }
}

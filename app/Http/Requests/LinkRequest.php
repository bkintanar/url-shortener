<?php

namespace URLShortener\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
{
    public function rules()
    {
        return [
            'link'    => 'required|url',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function authorize()
    {
        return true;
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'min:3',
                'max:100',
            ],
            'description' => [
                'required',
                'string',
                'min:10',
            ],
        ];
    }
}

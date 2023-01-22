<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogPostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'img_path' => 'required',
            'content' => 'required'
        ];
    }
}

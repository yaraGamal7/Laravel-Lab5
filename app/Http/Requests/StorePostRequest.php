<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        // 'title' => ['required','unique:posts','min:3'],
        'title' => [
                'required',
                'min:3',
                $this->route()->named('posts.store') ? 'unique:posts,title' : 'unique:posts,title,' . $this->post,
            ],
        'body'=> 'required|min:10',
        // 'user_id'=> 'exists:users,id'
        'image' => 'required|image|mimes:jpeg,png,jpg', // adjust the max file size as needed
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'title is required',
            'body.required' => 'body is required',
            'title.min' => 'Title must be at least 3 characters',
            'body.required' => 'body is required',
            'body.min' => 'body must be at least 10 characters',
            'image.mimes'=>"Image Must be jpeg or png format",
        ];
    }
}



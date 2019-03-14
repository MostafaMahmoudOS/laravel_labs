<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {  //dd($this->post);
        return [
            'title' => 'required|min:3|unique:posts,id,'.$this->post,
            'description' => 'required'
        ];
    }
}

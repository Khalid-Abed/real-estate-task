<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $rules=[
            'title' => 'required',
            'description' => 'required|max:2048',
            'contact_number' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:1024',
        ];

        if($this->getMethod() == 'POST'){
            $rules=array_merge($rules,[
                'contact_number' => 'unique:posts,contact_number',
            ]);
        }

        if($this->getMethod() == 'PUT'){
            $rules=array_merge($rules,[
                'contact_number' => 'unique:posts,contact_number,'.$this->post->id,
            ]);
        }
        return $rules;
    }
}

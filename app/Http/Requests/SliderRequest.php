<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        if ($this->method() === 'POST') {
            return [
                'title' => "required|unique:sliders,title",
                'content' => "required",
                'image' => ['required', 'image', 'mimes:png,jpg,jpeg']
            ];
        } else {
            return [
                'title' => "required|unique:sliders,title,{$this->slider->id}",
            ];
        }
    }
}

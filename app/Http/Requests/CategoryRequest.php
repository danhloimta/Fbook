<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lang;

class CategoryRequest extends FormRequest
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
            'name' => 'min:5|max:191',
        ];
    }

    public function messages()
    {
        return [
            'name.min' => Lang::get('validation.min.string'),
            'name.max' => Lang::get('validation.max.string'),
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('product_access');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'string'
            ],
            'description' => [
                'required', 'string'
            ],
            'price' => [
                'required', 'regex:/^\d+(\.\d{1,2})?$/'
            ],
            'quantity' => [
                'required', 'integer'
            ],
            'category' => [
                'required', 
            ],
            'picture_path' => [
                'nullable','image','mimes:jpeg,jpg,png,gif'
            ],
            'additional_imgs.*' => [
                'nullable','image','mimes:jpeg,jpg,png,gif'
            ],
        ];
    }
}

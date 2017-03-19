<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'image' => 'required|file|image|dimensions:width='.config('custom.product_image.width').',height='.config('custom.product_image.height').'|max:'.config('custom.product_image.max'),
            'status' => 'in:0,1'
        ];
    }
}

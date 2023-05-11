<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'           => ['required', 'max:100'],
            'price'          => ['required', 'numeric', 'digits_between:2,10'],
            'model'          => ['required', 'string', 'digits_between:4,6'],
            'subcategory_id' => ['required', 'integer', 'exists:subcategories,id'],
            'image'          => ['required', 'image', 'mimes:jpg, png, jpeg'],
        ];
    }
}

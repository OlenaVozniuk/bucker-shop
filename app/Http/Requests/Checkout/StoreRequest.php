<?php

namespace App\Http\Requests\Checkout;

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
            'first_name'  => ['required', 'string'],
            'second_name' => ['required', 'string'],
            'email'       => ['required', 'email'],
            'phone'       => ['required', 'integer'],
            'city'        => ['required', 'string'],
            'address'     => ['required', 'string'],
            'city_code'   => ['required', 'integer'],
        ];
    }
}

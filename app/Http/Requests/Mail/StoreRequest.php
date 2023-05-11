<?php

namespace App\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'    => ['required', 'string'],
            'email'   => ['required', 'email'],
            'message' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'тут написати текст помилки'

        ];
        // таким чином можна до кожного атрибуту і його рула вказувати свій кастомний текст помилки
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class ServiceRequest extends FormRequest
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
    public function rules(FormRequest $request): array
    {

        $rules = [
            'title_vn' => ['required','max:256'],
            'title_en' => ['required','max:256'],
            'title_jp' => ['required','max:256'],

            'images' => ['max:2056', 'required'],
        ];

        return $rules;
    }
}

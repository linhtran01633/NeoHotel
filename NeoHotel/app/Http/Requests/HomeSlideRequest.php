<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class HomeSlideRequest extends FormRequest
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
            'name_vn' => ['required','max:256'],
            'name_en' => ['required','max:256'],
            'name_jp' => ['required','max:256'],

            'title_vn' => ['max:256', 'required'],
            'title_en' => ['max:256', 'required'],
            'title_jp' => ['max:256', 'required'],

            'images' => ['max:2056', 'required'],
            'images_mobile' => ['max:2056', 'required'],
        ];

        return $rules;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
     * @return array<string => ['required','max:256'], \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'title_vn' => ['required','max:256'],
            'title_en' => ['required','max:256'],
            'title_jp' => ['required','max:256'],

            'title1_vn' => ['required','max:256'],
            'title1_en' => ['required','max:256'],
            'title1_jp' => ['required','max:256'],

            'title2_vn' => ['required','max:256'],
            'title2_en' => ['required','max:256'],
            'title2_jp' => ['required','max:256'],

            'title3_vn' => ['required','max:256'],
            'title3_en' => ['required','max:256'],
            'title3_jp' => ['required','max:256'],
        ];

        return $rules;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
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
    public function rules(): array
    {
        $array = [
            'title1_vn' => ['required','max:256'],
            'title1_en' => ['required','max:256'],
            'title1_jp' => ['required','max:256'],

            'title2_vn' => ['required','max:256'],
            'title2_en' => ['required','max:256'],
            'title2_jp' => ['required','max:256'],

            'title3_vn' => ['required','max:256'],
            'title3_en' => ['required','max:256'],
            'title3_jp' => ['required','max:256'],

            'title4_vn' => ['required','max:256'],
            'title4_en' => ['required','max:256'],
            'title4_jp' => ['required','max:256'],

            'title1_images'=> ['max:2056', 'required'],
            'title3_images'=> ['max:2056', 'required'],
            'title4_images'=> ['max:2056', 'required'],
        ];
        return $array;
    }
}

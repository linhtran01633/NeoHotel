<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
        $rules = [
            'question_vn' => ['required','max:256'],
            'question_en' => ['required','max:256'],
            'question_jp' => ['required','max:256'],

            'answer_vn' => ['max:512', 'required'],
            'answer_en' => ['max:512', 'required'],
            'answer_jp' => ['max:512', 'required'],
        ];

        return $rules;
    }
}

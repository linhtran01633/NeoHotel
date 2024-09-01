<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class CategoryRoomRequest extends FormRequest
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

            'price_vn' => ['max:256', 'nullable'],
            'price_en' => ['max:256', 'nullable'],
            'price_jp' => ['max:256', 'nullable'],

            'detail_vn' => ['max:1024', 'nullable'],
            'detail_en' => ['max:1024', 'nullable'],
            'detail_jp' => ['max:1024', 'nullable'],

            'acreage_vn' => ['max:256', 'nullable'],
            'acreage_en' => ['max:256', 'nullable'],
            'acreage_jp' => ['max:256', 'nullable'],

            'bed_vn' => ['max:256', 'nullable'],
            'bed_en' => ['max:256', 'nullable'],
            'bed_jp' => ['max:256', 'nullable'],

            'area_vn' => ['max:256', 'nullable'],
            'area_en' => ['max:256', 'nullable'],
            'area_jp' => ['max:256', 'nullable'],

            'images' => ['max:2056', 'nullable'],
        ];

        return $rules;
    }
}

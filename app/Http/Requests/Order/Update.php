<?php

namespace App\Http\Requests\Product;

use App\Models\Product\Service;
use App\Traits\validationCommon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends FormRequest
{
    use validationCommon;

    public function rules()
    {
        return [
            'name_ar'       => 'required|min:3',
            'name_en'       => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required'          => 'الاسم باللغة العربية مطلوب',
            'name_ar.min'               => 'الاسم باللغة العربية علي الاقل ثلاثة احرف',
            'name_en.required'          => 'الاسم باللغة الانجليزية مطلوب',
            'name_en.min'               => 'الاسلم باللغة الانجليزية علي الاقل ثلاثة احرف',
        ];
    }
}

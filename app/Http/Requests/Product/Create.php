<?php

namespace App\Http\Requests\Product;

use App\Traits\validationCommon;
use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    use validationCommon;

    public function rules()
    {
        return [
            'name_ar'       => 'required|min:3',
            'name_en'       => 'required|min:3',
            'description_ar'       => 'required',
            'description_en'       => 'required',
            'image'         => 'required|image',
            'sub_category'         => 'nullable',
            'main_category'         => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required'          => 'الاسم باللغة العربية مطلوب',
            'name_ar.min'               => 'الاسم باللغة العربية علي الاقل ثلاثة احرف',
            'name_en.required'          => 'الاسم باللغة الانجليزية مطلوب',
            'name_en.min'               => 'الاسلم باللغة الانجليزية علي الاقل ثلاثة احرف',
            'description_ar.required'    => 'الوصف عربي  مطلوب',
            'description_en.required'    => 'الوصف انجليزي  مطلوب',
            'image.required'         => 'صورة المنتج مطلوب',
            'image.image'               => "برجاء ارفاق صورة مناسبة"
        ];
    }
}

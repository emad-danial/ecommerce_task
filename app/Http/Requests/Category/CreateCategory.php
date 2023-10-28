<?php

namespace App\Http\Requests\Category;

use App\Traits\validationCommon;
use Illuminate\Foundation\Http\FormRequest;

class CreateCategory extends FormRequest
{
    use validationCommon;

    public function rules()
    {
        return [
            'name_ar'       => 'required|min:3',
            'name_en'       => 'required|min:3',
            'image'         => 'required_if:category_type,sub_category|image',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required'          => 'الاسم باللغة العربية مطلوب',
            'name_ar.min'               => 'الاسم باللغة العربية علي الاقل ثلاثة احرف',
            'name_en.required'          => 'الاسم باللغة الانجليزية مطلوب',
            'name_en.min'               => 'الاسلم باللغة الانجليزية علي الاقل ثلاثة احرف',
            'category_type.required'    => 'نوع القسم مطلوب',
            'category_type.in'          => 'نوع القسم مطلوب قسم رئيسي او فرعي',
            'main_category.required_if' => 'القسم الرئيسي مطلوب',
            'main_category.exits'       => 'القسم الرئيسي غير موجود',
            'image.required_if'         => 'صورة القسم مطلوب',
            'image.image'               => "برجاء ارفاق صورة مناسبة"
        ];
    }
}

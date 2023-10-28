<?php

namespace App\Http\Requests\Category;

use App\Models\Product\Category;
use App\Rules\CheckImageRequiredInCategory;
use App\Traits\validationCommon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategory extends FormRequest
{
    use validationCommon;

    public function rules()
    {
        return [
            'category_id'   => 'required|exists:categories,id',
            'name_ar'       => 'required|min:3',
            'name_en'       => 'required|min:3',
            'category_type' => 'required|in:main_category,sub_category',
            'main_category' => 'required_if:category_type,sub_category',
            'image'         => [Rule::requiredIf(function () {
                return
                    request('category_type') == 'sub_category' &&
                    is_null(Category::find(request('category_id'))->category_id);
            })],
        ];
    }

    public function messages()
    {
        return [
            'category_id.required'      => 'القسم مطلوب',
            'category_id.exists'        => 'القسم غير موجود',
            'name_ar.required'          => 'الاسم باللغة العربية مطلوب',
            'name_ar.min'               => 'الاسم باللغة العربية علي الاقل ثلاثة احرف',
            'name_en.required'          => 'الاسم باللغة الانجليزية مطلوب',
            'name_en.min'               => 'الاسلم باللغة الانجليزية علي الاقل ثلاثة احرف',
            'category_type.required'    => 'نوع القسم مطلوب',
            'category_type.in'          => 'نوع القسم مطلوب قسم رئيسي او فرعي',
            'main_category.required_if' => 'القسم الرئيسي مطلوب',
            'main_category.exits'       => 'القسم الرئيسي غير موجود',
            'image.required_if'         => 'صورة القسم مطلوب',
        ];
    }
}

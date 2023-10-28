<?php

namespace App\Http\Requests\Order;

use App\Traits\validationCommon;
use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    use validationCommon;

    public function rules()
    {
        return [
            'address'       => 'required|string|min:3',
            'total_price'       => 'required',
            'items'       => 'required|array|min:1',
        ];
    }

    public function messages()
    {
        return [
            'address.required'          => 'العنوان  مطلوب',
            'total_price.required'          => 'الاجمالى  مطلوب',
            'items.required'          => 'العناصر  مطلوب',
            'items.min'          => 'العناصر  مطلوب على الاقل واحد',
            'address.min'               => 'العنوان  علي الاقل ثلاثة احرف',
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use App\Traits\validationCommon;
use Illuminate\Foundation\Http\FormRequest;

class CreateAdmin extends FormRequest
{
    use validationCommon;

    public function rules()
    {
        return [
            'name'     => 'required|min:3',
            'phone'    => 'required|unique:users,phone',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id'  => 'required|exists:roles,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'الاسم مطلوب',
            'name.min'          => 'الاسم علي الاقل ثلاثة احرف',
            'phone.required'    => 'رقم الهاتف مطلوب',
            'phone.unique'      => 'رقم الهاتف موجود بالفعل',
            'email.required'    => 'البريد الالكتروني مطلوب',
            'email.email'       => 'برجاء كتابة البريد الالكتروني بالطريقة الصحيحة',
            'email.unique'      => 'البريد الالكتروني موجود بالفعل',
            'password.required' => 'الرقم السري مطلوب',
            'password.min'      => 'الرقم السري علي الاقل 6 احرف',
            'role_id.required'  => 'الصلاحية مطلوبة',
            'role_id.exits'     => 'الصلاحية غير موجودة'
        ];
    }
}

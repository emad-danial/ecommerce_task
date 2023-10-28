<?php

namespace App\Http\Requests\User;

use App\Traits\validationCommon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
{
    use validationCommon;

    public function rules()
    {
        return [
            'user_id'  => "required|exists:users,id",
            'name'     => 'required|min:3',
            'phone'    => 'required|unique:users,phone,' . request('user_id'),
            'email'    => 'required|email|unique:users,email,' .request('user_id'),
            'password' => 'nullable|min:6'
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
            'password.min'      => 'الرقم السري علي الاقل 6 احرف'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>'required',
            'email' =>'required|email|unique:customers,email',
            'mobile' =>'required|numeric',
            'address' =>'required',


        ];
    }

    public function messages(){
        return [
            'name.required' => 'برجاء إدخال إسم العميل',
            'email.required' => 'برجاء إدخال البريد الإلكتروني',
            'email.email' => 'برجاء إدخال بريد إلكتروني صحيح',
            'email.unique' => 'العميل مسجل مسبقا بسجلات النظام',
            'mobile.required' => 'برجاء إدخال رقم الهاتف ',
            'mobile.numeric' => ' رقم الهاتف يتكون من أرقام فقط',
            'address.required' => 'برجاء إدخال عنوان العميل',

        ];
    }
}

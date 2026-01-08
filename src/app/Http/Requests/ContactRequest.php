<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => 'required|string|max:8',
            'last_name' => 'required|string|max:8',
            'gender' => 'required|in:1,2,3',
            'email' => 'required|email',
            'phone1' => 'required|numeric|digits_between:1,5',
            'phone2' => 'required|numeric|digits_between:1,5',
            'phone3' => 'required|numeric|digits_between:1,5',
            'address' => 'required|string',
            'content' => 'required',
            'detail' => 'required|string|max:120',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => '名前（名）を入力してください',
            'first_name.max' => '名前（名）は8文字以内で入力してください',
            'last_name.required' => '名前（姓）を入力してください',
            'last_name.max' => '名前（姓）は8文字以内で入力してください',
            'gender.required' => '性別を選択してください',
            'gender.in' => '性別の選択が不正です',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式が不正です',
            'phone1.required' => '電話番号を入力してください',
            'phone1.numeric' => '電話番号は数字で入力してください',
            'phone1.digits_between' => '電話番号の形式が不正です',
            'phone2.required' => '電話番号を入力してください',
            'phone2.numeric' => '電話番号は数字で入力してください',
            'phone2.digits_between' => '電話番号の形式が不正です',
            'phone3.required' => '電話番号を入力してください',
            'phone3.numeric' => '電話番号は数字で入力してください',
            'phone3.digits_between' => '電話番号の形式が不正です',
            'address.required' => '住所を入力してください',
            'content.required' => 'お問い合わせ項目を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}

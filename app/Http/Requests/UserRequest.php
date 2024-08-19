<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|',
            'password_confirmation' => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Tên tài khoản chưa nhập',
            'email.email' => 'Phải nhập đúng email',
            'email.required' => 'Email Chưa nhâp',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Nhập mật khẩu',
            'password_confirmation.required' => 'Nhập lại mật khẩu',
        ];
    }
}

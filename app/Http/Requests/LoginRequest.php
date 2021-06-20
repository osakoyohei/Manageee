<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|max:255',
            'password' => 'required',
            'g-recaptcha-response' => ['required', new \Arcanedev\NoCaptcha\Rules\CaptchaRule],
        ];
    }
    
    public function messages()
    {
        return [
            // 'v2のチェックボックスで、チェックがされていないときのメッセージ'
            'g-recaptcha-response.required' => '私はロボットではありませんにチェックをしてください。',
        ];
    }
}

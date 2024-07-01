<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        $check=[
    'logo'=>"mimes:jpeg,png",
    'favicon'=>"mimes:jpeg,png",
    'facebook_url'=>"string|required",
    'linkedin_url'=>"string|required",
    'email'=>"email|required",
    'phone_number'=>"string|required"
        ];
        foreach (config('app.languages')as $key=>$value){
        $check[$key.'.title']=['string'];
        $check[$key.'.address']=['string'];
        $check[$key.'.content']=['string'];
        }

        return $check;
    }
}

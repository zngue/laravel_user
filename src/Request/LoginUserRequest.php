<?php


namespace Zngue\User\Request;


use Zngue\Helper\ApiFromRequest;

class LoginUserRequest extends ApiFromRequest
{
    public function authorize()
    {
        return parent::authorize(); // TODO: Change the autogenerated stub
    }
    public function rules()
    {
        return [
            'username'=>'bail|required',
            'password'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>' :attribute 不能为空 ',
            'password.required'=>' :attribute 不能为空 '
        ];
    }
}

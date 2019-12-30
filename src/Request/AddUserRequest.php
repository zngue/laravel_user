<?php
namespace Zngue\User\Request;
use Zngue\Helper\ApiFromRequest;
use Zngue\Helper\Common;
class AddUserRequest extends ApiFromRequest
{
    public function authorize(){
        return true;
    }
    public function rules()
    {
        return [
            'username' => 'bail|required|unique:users|max:255',
            'password' => 'required|alpha_dash',
            'phone'=>'unique:users|regex:'.Common::mobileReg()
        ];
    }
    public function messages()
    {
        return [
            'username.required' => ':attribute 必须',
            'username.unique' => ':attribute 不能重复',
            'phone.unique' => ':attribute 该手机号码已注册',
            'phone.regex'=>':attribute 手机号格式不正确'
        ];
    }


}

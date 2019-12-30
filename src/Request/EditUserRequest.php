<?php
namespace Zngue\User\Request;
use Zngue\Helper\ApiFromRequest;
use Zngue\Helper\Common;

class EditUserRequest extends ApiFromRequest
{

    public function authorize(){
        return true;
    }
    public function rules()
    {
        return [
            'id' => 'bail|required|numeric',
            'username'=>'unique:users',
            'phone'=>'unique:users'
        ];
    }
    public function messages()
    {
        return [
            'id.required' => ':attribute 不能为空',
            'id.numeric' => ':attribute 必须为数字',
            'username.unique'=>':attribute 该用户名已经存在',
            'phone.unique'=>':attribute 该手机号已注册',
        ];
    }

}

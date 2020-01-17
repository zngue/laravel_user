<?php


namespace Zngue\User\Controller;


use Illuminate\Container\Container;
use Illuminate\Support\Facades\Auth;
use Zngue\Helper\BaseController;
use Zngue\User\Request\LoginUserRequest;

class LoginController extends BaseController
{
    public function index(Container $container){


        return view('User::login.index');
    }
    public function username()
    {
        return 'username';
    }

    public function doLogin(LoginUserRequest $request){


        $data =$request->only('username','password');

        //Auth::attempt($data)
        $user_res =Auth::attempt($data);


        if ($user_res){
            return $this->returnArray([],'登录成功');
        }else{
            return $this->returnArray([],'登录失败,请稍后再试',100);
        }
    }


}

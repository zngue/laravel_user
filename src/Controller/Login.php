<?php
namespace Zngue\User\Controller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Zngue\User\Request\LoginUserRequest;

class Login extends Controller
{
    public function login(LoginUserRequest $request){
        $data  =$request->only('username','password');
        $token =$this->userLogin($data);
        if ($token==false){
            return $this->returnArray([],'登录失败',100);
        }else{
            $return_data = [
                'accessToken'=>$token,
                'tokenType' => 'Bearer',
            ];
            return $this->returnArray($return_data);
        }
    }
    public function pointLogin(){




    }

    public function refreshToken(){
       // return $this->respondWithToken(auth('api')->refresh());
    }
    public function user(){
        return auth('api')->user();
    }

}

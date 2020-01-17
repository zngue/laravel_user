<?php
namespace Zngue\User\Middleware;
use  Closure;
use Zngue\Helper\Helpers;


class LoginMiddleware
{
    use Helpers;
    public function handle($request, Closure $next){


        $user =$this->adminUser();

        $a =$user->user();
        print_r($a);die;
        $user =$this->user();
        if (empty($user)){
            return $this->returnArray([],'请先登录',423);
        }
        return $next($request);
    }
}

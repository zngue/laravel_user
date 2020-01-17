<?php


namespace Zngue\User\Controller;

use Illuminate\Support\Facades\View;
class TestController
{
    public function index(){

        echo  route('login.index');

        return view('User::index.user');
    }
}

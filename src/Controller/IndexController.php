<?php


namespace Zngue\User\Controller;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Zngue\Helper\BaseController;
use Illuminate\Support\Facades\DB;

class IndexController extends BaseController{

    public function index(Request $request){

        $user=Auth::user();
        $id = Auth::id();
       dd($user);die;
        return view('User::index.index');
    }
    public function main(){
        $version=DB::select('SELECT VERSION() AS ver');
        $config  = [
            'url'             => $_SERVER['HTTP_HOST'],
            'document_root'   => $_SERVER['DOCUMENT_ROOT'],
            'server_os'       => PHP_OS,
            'server_port'     => $_SERVER['SERVER_PORT'],
            'server_ip'       => $_SERVER['SERVER_ADDR'],
            'server_soft'     => $_SERVER['SERVER_SOFTWARE'],
            'php_version'     => PHP_VERSION,
            'mysql_version'   => $version[0]->ver,
            'max_upload_size' => ini_get('upload_max_filesize')
        ];
        return view('User::index.main',compact('config'));
    }

}

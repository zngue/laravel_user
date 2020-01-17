<?php
namespace Zngue\User\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Zngue\Helper\BaseController;
use Zngue\Helper\Common;
use Zngue\User\Models\User as UserModel;
use Zngue\User\Request\AddUserRequest;
use Zngue\User\Request\EditUserRequest;

class User extends BaseController
{
    public function index(){
        $name = 'zhangsan';
       // echo $name;die;

        return view('a.list',compact('name'));
    }
    /**
     * @param AddUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @author zngue
     * @time  2019-12-25
     * @desc 增加用户...
     */
    public function add(AddUserRequest $request){
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $id  =UserModel::insertGetId($data);
        $user =UserModel::where('id',$id)->first();
       //$token=$this->token($user);
        if ($user){
            return $this->returnArray();
        }else{
            return  $this->returnArray([],'信息错误',100);
        }
    }
    public function getUserList(Request $request){
        $keyword=$request->input('keyword','');
        $userList = UserModel::orWhere(function ($q) use ($keyword) {
            if ($keyword){
                $q->orWhere('username','like','%'.$keyword.'%');
                $q->orWhere('nickname','like','%'.$keyword.'%');
            }
        })->paginate(Common::listPageNum());
        $data = ['list'=>[], 'total'=>0  ];
        if (!empty($userList)){
            $list =$userList->items();
            $total=$userList->total();
            $data=[
                'list'=>$list,
                'total'=>$total
            ];
        }
        return $this->returnArray($data);
    }
    /**
     * @param AddUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @author zngue
     * @time  2019-12-25
     * @desc 修改用户...
     */
    public function edit(EditUserRequest $request){
        $data = $request->all();
        $id = $data['id'];
        unset($data['id']);
        if (!empty($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }
        $res =UserModel::where('id',$id)->update($data);
        if ($res){
            return $this->returnArray();
        }else{
            return $this->returnArray([],'修改失败',100);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author zngue
     * @time  2019-12-25
     * @desc 获取一条用户信息...
     */
    public function getOne(Request $request){
        $id =$request->input('id',0);
        if ($id == 0 ){
            return $this->returnArray([],'参数错误',100);
        }
        $userInfo=UserModel::where('id',$id)->first();
        if (!empty($userInfo)){
           return $this->returnArray( $userInfo );
        }else{
            return $this->returnArray([],'用户信息不存在',100);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author zngue
     * @time  2019-12-25
     * @desc 删除用户信息...
     */
    public function delInfo(Request $request){

        $id = $request->input('id',0);
        if ($id == 0){
            return $this->returnArray([],'参数错误',100);
        }
        $info=UserModel::where('id',$id)->delete($id);
        if (!empty($info)){
            return $this->returnArray([],'删除成功');
        }else{
            return $this->returnArray([],'删除失败',100);
        }
    }
}

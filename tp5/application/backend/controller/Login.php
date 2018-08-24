<?php

namespace app\backend\controller;

use think\Controller;
use think\Request;
use app\common\model\UserModel;

class Login extends Controller

{
    public function login(Request $request)
    {
        if (session('user')) {
            $this->redirect('index');
        }
            if ($request->isPost()) {
                //验证用户是否存在
                $username = $request->post('username','','trim');
                $user = UserModel::where('username',$username)->find();
                if (!$user) {
                    $this->error('登录失败，用户不存在!','reg');                
                }
                //验证密码
                $encryptpassword = encrypt($request->post('password'));
                if ($encryptpassword != $user->password) {
                    $this->error('登录失败，用户名或密码错误!');                
                }
                $userInfo = [
                    'id'       => $user->id,
                    'username' => $user->username,
                    'nickname' => $user->nickname,
                    'avatar'   => $user->avatar,
                ];
                session('user',$userInfo);
                $this->success('登录成功','index');
            }
        return $this->fetch('login/login');
    }
    public function logout(Request $request)
    {
        session('user',null);
        $this->success('正在退出.....','login');
    }
}
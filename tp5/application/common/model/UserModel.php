<?php
namespace app\common\model;

use think\Model;

class UserModel extends Model
{
	public $pk = 'id';
	public $name = 'users';
	public function isUserExist($username)
	{
	//验证用户名是否重复
		return self::where('username',$username)->count() ? 1 : 0;
	}
}

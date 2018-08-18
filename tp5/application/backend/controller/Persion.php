<?php

namespace app\backend\controller;

use think\Request;
use app\backend\controller\Base;

class Persion extends Base
{
	public function persion(Request $request)
	{
		$this->checkSession();

		return $this->fetch('persion/persion');
	}
}
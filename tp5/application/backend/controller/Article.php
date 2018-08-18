<?php

namespace app\backend\controller;

use think\Request;
use app\backend\controller\Base;

class Article extends Base
{
	public function article(Request $request)
	{
		$this->checkSession();

		return $this->fetch('article/article');
	}
}
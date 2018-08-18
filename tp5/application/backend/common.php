<?php
function check_username($username)
{
	//验证用户名是否合法 用户长度4-12字母数字下划线 \w \d
	$pattern = '/^\w{4,12}$/';
	return preg_match($pattern, $username);
}
function encrypt($str)
{
	return md5($str);
}
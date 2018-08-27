<?php

class Foo
{
	private static $ins;

	private function __construct()
	{

	}

	public static function getInstance()
	{
		if (self::$ins) {
			self::$ins = new self;
		}
		return self::$ins;
	}

	private function __clone()
	{

	}
}

$obj = Foo::getInstance();

print_r($obj);

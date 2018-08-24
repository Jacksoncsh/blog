<?php
namespace app\common\model;

use think\model\Pivot;
// use think\Model;

class ArticleTagMapModel extends Pivot
{
	protected $pk   = 'id';
	protected $name = 'articles_tag_map';
}

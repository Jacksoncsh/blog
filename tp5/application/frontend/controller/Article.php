<?php
namespace app\frontend\controller;
use app\common\model\ArticleModel;
use app\common\model\CategoryModel;
use app\common\model\TagModel;
use app\common\model\UserModel;
use app\common\model\ArticleTagMapModel;
use think\Controller;
use think\Request;
class Article extends Controller
{
	public function article(Request $request)
	{
		$where = [];
		$categoryId=$request->get('category', 0);
		$category = CategoryModel::get($categoryId);
		if ($category) {
			$where['category_id'] = $category->id;
		}
		$articles = ArticleModel::where($where)->order('id','desc')->paginate(5);
		$page = $articles->render();
		$this->assign('currcategory',$category);
		$this->assign('articles',$articles);
		$this->assign('page',$page);
		return $this->fetch('article/list');
	}

	public function category(Request $request)
	{
		$categorys = CategoryModel::where('article_num','>',0)->order('id','desc')->select();
		$this->assign('categorys',$categorys);
		return $this->fetch('article/ajax/category_list');
	}
	
	public function tag(Request $request)
	{
		$tags = TagModel::order('id','desc')->select();
		$this->assign('tags',$tags);
		return $this->fetch('article/ajax/tag_list');
	}
	public function detail(Request $request, $id)
	{	
		$article = ArticleModel::get($id);
		if (!$article) {
			$this->error('文章不存在','index');
		}
		$this->assign('article',$article);
		return $this->fetch('article/detail');
	}
}
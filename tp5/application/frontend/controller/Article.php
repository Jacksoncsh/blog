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
		$articles = ArticleModel::where($where)->order('view','desc')->paginate(4);
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
		$tagIds = ArticleTagMapModel::where('article_id',$id)->column('tag_id');
		$articleIds = ArticleTagMapModel::whereIn('tag_id',$tagIds)->distinct(true)->column('article_id');
		$articles = ArticleModel::whereIn('id',$articleIds)->select();

		$article->view +=1;
		$article->save();

		$this->assign('article',$article);
		$this->assign('articles',$articles);
		return $this->fetch('article/detail');
	}
	
	public function tag_detail(Request $request, $id)
	{	
		$tag = TagModel::get($id);
		if (!$tag) {
			$this->error('标签不存在','index');
		}
		$articleIds = ArticleTagMapModel::where('tag_id',$id)->column('article_id');
		$articles = ArticleModel::whereIn('id',$articleIds)->paginate(4);
		$page = $articles->render();


		$this->assign('page',$page);
		$this->assign('articles',$articles);
		$this->assign('tag',$tag);
		return $this->fetch('article/tag');
	}	

	public function user_detail(Request $request, $id)
	{	
		$user = UserModel::get($id);
		if (!$user) {
			$this->error('用户不存在','index');
		}

		$articles = ArticleModel::where('user_id',$user->id)->paginate(4);
		$page = $articles->render();

		$this->assign('page',$page);
		$this->assign('articles',$articles);
		$this->assign('user',$user);
		return $this->fetch('article/user');
	}
}

<?php
namespace app\backend\controller;
use think\Request;
use app\backend\controller\Base;
use app\common\model\ArticleModel;
use app\common\model\CategoryModel;
use app\common\model\TagModel;
use app\common\model\ArticleTagMapModel;
class Article extends Base
{
	public function initialize()
	{
		$this->assign('nav', 'article');
		$this->checkSession();
	}
	public function article(Request $request)
	{
		$currentUser = $this->getCurrentUser();
		$articles = ArticleModel::where('user_id',$currentUser->id)
					->order('id','asc')
					->paginate(5);
		$page = $articles->render();
		// 通过循环
		// foreach ($articles as $key => $article) {
		// 	$category = CategoryModel::get($article->category_id);
		// 	$article->category = $category;
		// }

		// 把所有的category_id都找出来放到一个数组[1,6,5,6], CategoryModel:where_in
		// $categoryIds = [];
		// foreach ($articles as $key => $article) {
		// 	$categoryIds[] = $article->category_id;
		// }
		// $categories = CategoryModel::whereIn('id', $categoryIds)->select();

		// $newCategories = [];
		// foreach ($categories as $key => $category) {
		// 	$newCategories[$category->id] = $category;
		// }
		// $this->assign('newCategories', $newCategories);
		$this->assign('articles',$articles);
		$this->assign('page',$page);
		return $this->fetch('article/article');
	}
	public function add(Request $request)
	{
		$currentUser = $this->getCurrentUser();

		if ($request->isPost()) {
			$postData = $request->post();
			if (!$postData['title']) {
				return $this->error('添加失败,标题不能为空');
			}if (!$postData['content']) {
				return $this->error('添加失败,内容不能为空');
			}

			$articleModel = new ArticleModel;
			$article = $articleModel->addArticle($postData);
			if (!$article) {
				return $this->error('添加失败');
			}
			return $this->success('添加成功', 'article');
		}
		//查出所有的category和tag
		$categories = CategoryModel::where('user_id',$currentUser->id)
					->order('id','desc')
					->select();
		$tags = TagModel::where('user_id',$currentUser->id)
					->order('id','desc')
					->select();
		$this->assign('categories',$categories);
		$this->assign('tags',$tags);
		return $this->fetch('article/add');
	}
	public function edit(Request $request, $id)
	{
		$currentUser = $this->getCurrentUser();

		$article = ArticleModel::get($id);
			if (!$article) {
					return $this->error('编辑失败,文章不存在');
			}

			if ($request->isPost()) {
				$postData = $request->post();
				if (!$postData['title']) {
					return $this->error('编辑失败,标题不能为空');
				}
				if (!$postData['content']) {
					return $this->error('编辑失败,内容不能为空');
				}

				$articleModel = new ArticleModel;
				$article = $articleModel->editArticle($id,$postData);

				if (!$article) {
					return $this->error('编辑失败');
				}
				return $this->success('编辑成功', 'article');
			}

			$article->tagIds = ArticleTagMapModel::where('article_id', $id)->column('tag_id');

			$categories = CategoryModel::where('user_id',$currentUser->id)
					->order('id','desc')
					->select();
			$tags = TagModel::where('user_id',$currentUser->id)
					->order('id','desc')
					->select();
			$this->assign('categories',$categories);
			$this->assign('tags',$tags);
			$this->assign('article', $article);
			return $this->fetch('article/edit');
	}
	public function delete(Request $request, $id)
	{
			$article = ArticleModel::get($id);
			// ArticleTagMapModel::where('article_id', $id)->delete();
			if (!$article) {
					return $this->error('删除失败,分类不存在');
			}
			$article->tags()->detach();
			$article->delete();
			//中间表删除
			// $article->tags()->detach();
			return $this->success('删除成功', 'article');
	}
}
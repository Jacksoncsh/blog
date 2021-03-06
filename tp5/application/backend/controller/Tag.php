<?php
namespace app\backend\controller;
use think\Request;
use app\backend\controller\Base;
use app\common\model\TagModel;
class Tag extends Base
{
	public function initialize()
	{
		$this->assign('nav', 'tag');
		$this->checkSession();
	}
	public function tag(Request $request)
	{
		$currentUser = $this->getCurrentUser();
		// 查询所有分类
		$tags = TagModel::where('user_id', $currentUser->id)
						->order('id', 'asc')
						->paginate(5);
		$page = $tags->render();

		$this->assign('tags', $tags);//将控制器中的变量发送到模板页面
		$this->assign('page', $page);//将控制器中的变量发送到模板页面
		return $this->fetch('tag/tag');
	}
	public function add(Request $request)
	{
		if ($request->isPost()) {
			$title = $request->post('title', '', 'trim');
			if (!$title) {
				return $this->error('添加失败,标题不能为空');
			}
			$currentUser = $this->getCurrentUser();
			$tag = new TagModel;
			$tag->name = $title;
			$tag->created_time = date("Y-m-d H:i:s",time());
			$tag->user_id = $currentUser->id;
			$tag->save();
			return $this->success('添加成功', 'tag');
		}
		return $this->fetch('tag/add');
	}
	public function edit(Request $request, $id)
	{
		$tag = TagModel::get($id);
		if (!$tag) {
			return $this->error('编辑失败,标签不存在');
		}
		if ($request->isPost()) {
			$title = $request->post('title', '', 'trim');
			if (!$title) {
				return $this->error('编辑失败,标签不能为空');
			}
			$tag->name = $title;
			$tag->save();
			return $this->success('编辑成功', 'tag');
		}
		$this->assign('tag', $tag);
		return $this->fetch('tag/edit');
	}
	public function delete(Request $request, $id)
	{
		$tag = tagModel::get($id);
		if (!$tag) {
			return $this->error('删除失败,分类不存在');
		}
		$tag->delete();
		return $this->success('删除成功', 'tag');
	}
}
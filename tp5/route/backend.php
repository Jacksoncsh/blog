<?php
//登录
Route::rule('/login$','backend/Login/login')->name('login');
//退出
Route::rule('/logout','backend/Login/logout')->name('logout');
//注册
Route::rule('/reg$','backend/Reg/reg')->name('reg');
//判断用户是否存在
Route::get('/user/exist', 'backend/Reg/userExist')->name('user_exist');
//分类管理
Route::get('/category$', 'backend/Category/category')->name('category');
//添加分类
Route::rule('/category/add$', 'backend/Category/add')->name('category_add');
//编辑分类
Route::rule('/category/:id/edit$', 'backend/Category/edit')
			->pattern(['id'=>'\d+'])
			->name('category_edit');
//删除分类
Route::get('/category/:id/delete$', 'backend/Category/delete')
			->pattern(['id'=>'\d+'])
			->name('category_delete');
//标签管理
Route::get('/tag$', 'backend/Tag/tag')->name('tag');
//添加标签
Route::rule('/tag/add$', 'backend/Tag/add')->name('tag_add');
//编辑标签
Route::rule('/tag/:id/edit$', 'backend/Tag/edit')
			->pattern(['id'=>'\d+'])
			->name('tag_edit');
//删除标签
Route::get('/tag/:id/delete$', 'backend/Tag/delete')
			->pattern(['id'=>'\d+'])
			->name('tag_delete');
//文章管理
Route::get('/article$', 'backend/Article/article')->name('article');
//新增文章
Route::rule('/article/add$', 'backend/Article/add')->name('article_add');
//编辑文章
Route::rule('/article/:id/edit$', 'backend/Article/edit')
			->pattern(['id'=>'\d+'])
			->name('article_edit');
//删除文章
Route::get('/article/:id/delete$', 'backend/Article/delete')
			->pattern(['id'=>'\d+'])
			->name('article_delete');
//个人信息管理
Route::rule('/persion$', 'backend/Persion/persion')->name('persion');
//用户头像
Route::rule('/persion/avatar$', 'backend/Persion/avatar')->name('avatar');

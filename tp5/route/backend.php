<?php
//登录退出
Route::rule('/login$','backend/Login/login')->name('login');
Route::rule('/logout','backend/Login/logout')->name('logout');
//注册
Route::rule('/reg$','backend/Reg/reg')->name('reg');
Route::get('/user/exist', 'backend/Reg/userExist')->name('user_exist');

//分类管理
Route::get('/category$', 'backend/Category/category')->name('category');
Route::rule('/category/add$', 'backend/Category/add')->name('category_add');
Route::rule('/category/:id/edit$', 'backend/Category/edit')
			->pattern(['id'=>'\d+'])
			->name('category_edit');
Route::get('/category/:id/delete$', 'backend/Category/delete')
			->pattern(['id'=>'\d+'])
			->name('category_delete');

//标签管理
Route::get('/tag$', 'backend/Tag/tag')->name('tag');
Route::rule('/tag/add$', 'backend/Tag/add')->name('tag_add');
Route::rule('/tag/:id/edit$', 'backend/Tag/edit')
			->pattern(['id'=>'\d+'])
			->name('tag_edit');
Route::get('/tag/:id/delete$', 'backend/Tag/delete')
			->pattern(['id'=>'\d+'])
			->name('tag_delete');
//文章管理
Route::get('/article$', 'backend/Article/article')->name('article');
Route::rule('/article/add$', 'backend/Article/add')->name('article_add');
Route::rule('/article/:id/edit$', 'backend/Article/edit')
			->pattern(['id'=>'\d+'])
			->name('article_edit');
Route::get('/article/:id/delete$', 'backend/Article/delete')
			->pattern(['id'=>'\d+'])
			->name('article_delete');
//个人信息管理
Route::rule('/persion$', 'backend/Persion/persion')->name('persion');
Route::rule('/persion/avatar$', 'backend/Persion/avatar')->name('avatar');

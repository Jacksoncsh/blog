<?php

Route::rule('/login','backend/Login/login')->name('login');
Route::rule('/logout','backend/Login/logout')->name('logout');
// Route::post('/login/submit','backend/Login/loginSubmit')->name('login_submit');

Route::rule('/reg','backend/Reg/reg')->name('reg');
Route::rule('/registration','backend/Reg/reg')->name('reg');
Route::get('/user/exist', 'backend/Reg/userExist')->name('user_exist');

//分类管理
Route::get('/category', 'backend/Category/category')->name('category');
//标签管理
Route::get('/tag', 'backend/Tag/tag')->name('tag');
//文章管理
Route::get('article', 'backend/Article/article')->name('article');
//个人信息管理
Route::get('persion', 'backend/Persion/persion')->name('persion');

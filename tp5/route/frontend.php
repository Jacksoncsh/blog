<?php
Route::get('/','frontend/index/index')->name('index');

Route::get('/list$','frontend/article/article')->name('article_list');

Route::get('/list/category$','frontend/article/category')->name('ajax_category_list');

Route::get('/list/tag$','frontend/article/tag')->name('ajax_tag_list');

Route::get('/list/:id/detail$','frontend/article/detail')
			->pattern(['id'=>'\d+'])
			->name('detail_list');



Route::get('/content','frontend/index/content')->name('content');
Route::get('/add_article','frontend/index/add_article')->name('add_article');
Route::get('/add_category','frontend/index/add_category')->name('add_category');
Route::get('/list','frontend/index/list1')->name('list');
Route::get('/add_lable','frontend/index/add_lable')->name('add_lable');
Route::get('/article_management','frontend/index/article_management')->name('article_management');
Route::get('/backstage_management','frontend/index/backstage_management')->name('backstage_management');
Route::get('/change_password','frontend/index/change_password')->name('change_password');
Route::get('/classification_management','frontend/index/classification_management')->name('classification_management');
Route::get('/label_management','frontend/index/label_management')->name('label_management');
Route::get('/person_information','frontend/index/person_information')->name('person_information');
Route::get('/tag_list','frontend/index/tag_list')->name('tag_list');
Route::get('/users','frontend/index/users')->name('users');
Route::get('/content_md','frontend/index/content_md')->name('content_md');
Route::get('/add_article_md','frontend/index/add_article_md')->name('add_article_md');

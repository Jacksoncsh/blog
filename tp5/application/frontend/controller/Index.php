<?php
namespace app\frontend\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch('index/index');
    }
    public function content()
    {
        return $this->fetch('index/content');
    }
    public function add_article()
    {
        return $this->fetch('index/add_article');
    }
    public function add_category()
    {
        return $this->fetch('index/add_category');
    }
    public function list1()
    {
        return $this->fetch('index/list');
    }
    public function add_lable()
    {
        return $this->fetch('index/add_lable');
    }
    public function article_management()
    {
        return $this->fetch('index/article_management');
    }
    public function backstage_management()
    {
        return $this->fetch('index/backstage_management');
    }
    public function change_password()
    {
        return $this->fetch('index/change_password');
    }
    public function classification_management()
    {
        return $this->fetch('index/classification_management');
    }
    public function label_management()
    {
        return $this->fetch('index/label_management');
    }
    public function login()
    {
        return $this->fetch('index/login');
    }
    public function person_information()
    {
        return $this->fetch('index/person_information');
    }
    public function registration()
    {
        return $this->fetch('index/registration');
    }
    public function tag_list()
    {
        return $this->fetch('index/tag_list');
    }
    public function users()
    {
        return $this->fetch('index/users');
    }
    public function content_md()
    {
        return $this->fetch('index/content_md');
    }
    public function add_article_md()
    {
        return $this->fetch('index/add_article_md');
    }
}

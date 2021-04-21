<?php
namespace app\index\controller;
use app\index\model\Users;

class MyIndex
{
    public function hey($name = 'ThinkPHP5')
    {
        return Users::get(1)->name;
    }
}

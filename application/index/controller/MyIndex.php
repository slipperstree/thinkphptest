<?php
namespace app\index\controller;

class MyIndex
{
    public function hey($name = 'ThinkPHP5')
    {
        return 'hey!' . $name;
    }
}

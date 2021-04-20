<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        //return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
	return '你好ThinkPhp';
    }

    public function hello($name = 'ThinkPHP5', $pass = '123456')
    {
        //dump($this->request);
        //echo $this->request->param("name") . "<br>";
        return 'hello,' . $name . ' with password:' . $pass;
    }

    public function search($name = 'chenling')
    {
        //dump(Db::table('users')->where('name', $name)->find());
        dump(Db::table('users')->where('name', $name)->field('name, age')->find());
    }

    public function searchAll()
    {
        //dump(Db::query('select * from users'));
        dump(Db::table('users')->order('age', 'asc')->select());
    }

    public function add($name, $age)
    {
        Db::table('users')->insert(['name'=>$name, 'age'=>$age]);
        dump(Db::table('users')->where('name', $name)->find());
    }

    public function del($name)
    {
        Db::table('users')->where('name', $name)->delete();
        dump(Db::query('select count(1) as cnt from users'));
    }
}

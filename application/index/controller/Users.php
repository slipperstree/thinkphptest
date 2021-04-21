<?php
namespace app\index\controller;
use app\index\model\Users as UsersModel;

class Users
{
    public function add($name, $age)
    {
        $user = new UsersModel();
        $user->name = $name;
        $user->age = $age;

        if ($user->save()) {
            return '用户新增成功';
        } else {
            return '用户新增失败';
        }
        
    }

    public function select($name)
    {
        $users = UsersModel::where("name", $name)->all();

        foreach ($users as $key => $user) {
            echo $user->id . ":" . $user->name . " age:" . $user->age . "<br>";
        }
        
    }

    public function updateById($id, $name, $age)
    {
        $user = UsersModel::where("id", $id)->find();
        $user->name = $name;
        $user->age = $age;
        
        if ($user->save()) {
            return '单用户更新成功';
        } else {
            return '单用户更新失败';
        }
    }

    public function updateByName($name, $age)
    {
        $users = UsersModel::where("name", $name)->all();
        foreach ($users as $key => $user) {
            $user->name = $name;
            $user->age = $age;
            $user->save();
        }

        return '多用户更新成功';
    }

    public function deleteByName($name)
    {
        // $users = UsersModel::where("name", $name)->all();
        // $cnt = 0;
        // foreach ($users as $key => $user) {
        //     $user->delete();
        //     $cnt++;
        // }

        $cnt = UsersModel::where("name", $name)->delete();
        return $cnt . '个用户删除成功';
    }
}
<?php
namespace app\admin\model;
use think\Model;
use think\Db;


class Usermodel extends Model
{    
     //个人资料
     public function perinfo()
     {
          $userid = input('param.slsh_userid');
          return Db::name('user')->where('slsh_userid','=',$userid)->select();
     }
	//前台登录
     public function login($data)
     {
     	return Db::table('slsh_user')->insert($data);
     }
     //验证手机号是否注册过
     public function regselect($name)
     {
     	return   Db::name('user')->where('slsh_tel',$name)->select();
     }
     //验证正确手机号的密码
     public function selectPwd($name)
     {
          //return Db::name('user')->where('slsh_password',$mima)->select();
          return Db::table('slsh_user')->where('slsh_tel',$name)->value('slsh_password');

     }
     //后台登录
     public  function dologin()
     {        
              
          return Db::name('user')->where('slsh_userid','<>',0)->select();
     }
     //验证登陆是否有权限
     public function valogin($data)
     {
          return Db::name('user')->where('slsh_tel','=',$data)->find();
     }

     //判断是否有显示到首页的操作权限
          public function thirdvalogin($data)
     {
          return Db::name('user')->where('slsh_tel','=',$data)->find();
     }
     
}


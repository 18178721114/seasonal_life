<?php
namespace app\index\model;
use think\Model;
use think\Db;


class Usermodel extends Model
{    
    //查询余额
    public function money($data)
     {
         return   Db::query("select slsh_balance from slsh_money where slsh_userid = $data order by slsh_mid desc limit 1 ");
     }
     //查询id
     public function idid($data)
     {
         return  Db::name('user')->where('slsh_tel',$data)->find();
     }
     //注册
     public function registerAdd($data)
     {
          return Db::table('slsh_user')->insert($data);
     }
     //登录
     public function login($data)
     {
          return Db::table('slsh_user')->insert($data);
     }
     //验证手机号是否注册过
     public function regselect($name)
     {
          return   Db::name('user')->where('slsh_tel',$name)->select();
     }
     public function selectPwd($name)
     {
          //return Db::name('user')->where('slsh_password',$mima)->select();
          return Db::table('slsh_user')->where('slsh_tel',$name)->value('slsh_password');
     }
     public  function dologin($data)
     {                      
      return   Db::table('slsh_user')->where('slsh_tel',$data)->find();       
     }
     //查询用户id
      public  function id($data)
     {                    
      return   Db::table('slsh_user')->where('slsh_tel',$data)->find();
     }
}


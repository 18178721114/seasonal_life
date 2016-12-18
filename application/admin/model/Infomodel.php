<?php
namespace app\admin\model;
use think\Db;
use think\Model;
use think\Session;

class Infomodel extends Model
{
	//查找用户账户信息
	public function moneyinfo()
	{
		$userid = input('param.userid');
		return  Db::name('money')->where('slsh_userid',$userid)->order('slsh_mid')->paginate(10);
	}
	//查找卖家 的信息
	public function people()
	{
		return Db::name('user')->where('slsh_type','=',1)->select();
	}
	//查找买家的信息
	public function buyers()
	{
		return Db::name('user')->where('slsh_type','=',0)->select();
	}
	//删除用户
	public function del()	
	{	
		$userid = input('param.slsh_userid');
		return Db::table('slsh_user')->where('slsh_userid','=',$userid)->delete();
	}
}
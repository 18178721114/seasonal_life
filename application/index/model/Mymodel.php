<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\Session;

class Mymodel extends Model
{
	//将订单状态更改为已完成
	public function changefinish()
	{
		$orderid = input('param.orderid');
		return db('order')->where('slsh_oid',$orderid)->setField('slsh_state',4);
	}
	//查询订单信息
	public function orderinfo()
	{
		 $usertel = Session::get('username');
		 return   Db::name('order')->where('slsh_tel',$usertel)->order('slsh_order','desc')->paginate(5);
	}
	//订单查询地址
	public function orderaddress($data)
	{
       return   Db::name('address')->where('slsh_userid',$data)->select();
	}
	//提交订单查询地址
	public function orderaddress1($data)
	{
       return   Db::name('address')->where('slsh_userid',$data)->where('slsh_default',1)->find();
	}
	//设置默认地址
	public function default()
	{
		$address = input('param.addressid');
		Db::table('slsh_address')->where('slsh_addressid', $address) ->update(['slsh_default'=>1]);
		Db::table('slsh_address')->where('slsh_addressid','<>', $address) ->update(['slsh_default'=>0]);
	}
	//删除地址
	public function deladdress()
	{
		$addressid = input('param.slsh_addressid');
		return Db::table('slsh_address')->where('slsh_addressid',$addressid)->delete();
	}
	//查找地址
	public function selectaddress($userid)
	{
		return   Db::name('address')->where('slsh_userid',$userid)->select();
	}
	//添加地址
	public function addaddress($data)
	{
		return Db::table('slsh_address')->insert($data);
	}
	//修改密码
	public function updatepwd($data)
	{
		$usertel = Session::get('username');
		return Db::table('slsh_user')->where('slsh_tel', $usertel) ->update($data);
	}
	//修改密码时查找的原始密码
	public function selectpwd()
	{
		$usertel = Session::get('username');
		return Db::table('slsh_user')->where('slsh_tel',$usertel)->value('slsh_password'); 
	}
	//查找个人流水账
	public function selectmoney($userid)
	{
		return   Db::name('money')->where('slsh_userid',$userid)->order('slsh_mid')->paginate(7);
	}
	
	//充值金额
	public function addmoney($data)
	{
		return Db::table('slsh_money')->insert($data);	
	}
	//查询对应账户的最新余额
	public function selectbalance($userid)
	{
		return Db::query("select slsh_balance from slsh_money where slsh_userid = $userid order by slsh_mid desc limit 1 ");
	}
	//根据账户查出对应的用户id
	public function selectuserid()
	{
		$usertel = Session::get('username');
		return Db::table('slsh_user')->where('slsh_tel',$usertel)->value('slsh_userid');
	}
	//修改个人信息
	public function updateinfo($data)
	{
		$usertel = Session::get('username');
		return Db::table('slsh_user')->where('slsh_tel', $usertel) ->update($data);
	}
	//查找个人信息
	public function selectinfo()
	{
		$usertel = Session::get('username');
		return   Db::name('user')->where('slsh_tel',$usertel)->select();
	}
}
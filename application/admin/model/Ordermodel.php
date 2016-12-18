<?php
namespace app\admin\model;
use think\Model;
use think\Db;



class Ordermodel extends Model
{
	//将订单状态更改未已配送
	public function changesend()
	{
		$orderid = input('param.orderid');
		return db('order')->where('slsh_oid',$orderid)->setField('slsh_state',3);
	}
	//查询未支付订单
	public function notpayorder()
	{
		return Db::name('order')->where('slsh_state',0)->paginate(10);
	}
	//查询未配送订单
	public function notsend()
	{
		return Db::name('order')->where('slsh_state',1)->paginate(10);
	}
	//查询已配送订单
	public function send()
	{
		return Db::name('order')->where('slsh_state',3)->paginate(10);
	}
	//查询已完成订单
	public function finish()
	{
		return Db::name('order')->where('slsh_state',4)->paginate(10);
	}
	//根据用户查询对应的订单
	public function userorder()
	{
		$usertel = input('param.usertel');
		return Db::name('order')->where('slsh_tel',$usertel)->paginate(10);
	}
}
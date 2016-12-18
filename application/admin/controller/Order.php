<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\model\Indexmodel;
use app\admin\model\Catemodel;
use app\admin\model\Goodmodel;
use app\admin\model\Usermodel;
use app\admin\model\Ordermodel;
use think\Session;
class Order extends Controller
{
	public $cate;
	public $good;
	public $user;
	
	//初始化
	public function __construct()
	{
	 	parent::__construct();
        
	 	$this->cate= new Catemodel();
	 	$this->good= new Goodmodel();
	 	$this->user = new Usermodel();
	 	$session=Session::get('username');
	 	if(empty($session)){
	 		$this->error('请先登陆','admin/user/login');
	 	}
	 	//验证是否登录
	 	$login =$this->user->valogin($session);
	 	if($login['slsh_type'] !=1){
	 		$this->error('对不起你没有登录权限','admin/user/login');
	 	}

	}
	//安排配送商品
	public function sendgood()
	{
		$ordermodel = new Ordermodel;
		$result = $ordermodel->changesend();
		if ($result) {
			$this->success('配送成功','admin/order/send');
		}
	}
	//订单页面 。信息
	public function order()
	{
		$ordermodel = new Ordermodel;
		$orderinfo = $ordermodel->userorder();

		$this->assign('orderinfo',$orderinfo);
		return $this->fetch();
	}
	//未支付定订单页面、信息
	public function notpay()
	{
		$ordermodel = new Ordermodel;
		$orderinfo = $ordermodel->notpayorder();
		$this->assign('orderinfo',$orderinfo);
		return $this->fetch();
	}
	//未发送订单页面、信息
	public function notsend()
	{
		$ordermodel = new Ordermodel;
		$orderinfo = $ordermodel->notsend();
		$this->assign('orderinfo',$orderinfo);
		return $this->fetch();
	}
	//已配送订单页面、信息
	public function send()
	{
		$ordermodel = new Ordermodel;
		$orderinfo = $ordermodel->send();
		$this->assign('orderinfo',$orderinfo);
		return $this->fetch();
	}
	//已完成订单页面、信息
	public function finish()
	{
		$ordermodel = new Ordermodel;
		$orderinfo = $ordermodel->finish();
		$this->assign('orderinfo',$orderinfo);
		return $this->fetch();
	}
}
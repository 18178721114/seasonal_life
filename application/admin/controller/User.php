<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\model\Indexmodel;
use app\admin\model\Catemodel;
use app\admin\model\Goodmodel;
use app\admin\model\Usermodel;
use app\admin\model\Infomodel;
use think\Session;
class User extends Controller
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
	 		//$this->error('请先登陆','admin/user/login');
		}
	 	//验证是否登录
		$login =$this->user->valogin($session);
		if($login['slsh_type'] !=1){
	 		//s$this->error('对不起你没有登录权限','admin/user/login');
		}

	}
	//后台用户账户信息
	public function account()
	{
		$infomodel = new Infomodel();
		$moneyinfo = $infomodel->moneyinfo();
		$this->assign('moneyinfo',$moneyinfo);
		return $this->fetch();
	}
	//个人信息页面、信息
	public function personal()
	{
		$result = new Usermodel();
		$personal = $result->perinfo();
		$this->assign('personal',$personal);
		return $this->fetch();
	}
	//登陆
	public function login()
	{
		return $this->fetch();
	}
	//购物车
	public function shopcar()
	{
		$shop = input('param.shop');
      
      	$shopshow=$this->good->shopshow($shop);
      	$this->assign('shop',$shop);
      	$this->assign('shopshow',$shopshow);
		return $this->fetch();
	}
	//判断登陆
	public function dologin()
	{
		$usermodel = new  Usermodel;
		$request = Request::instance();
		$data =$request->param();
		$result = $usermodel->dologin();
		foreach ($result as $key => $value) {			
			if( $value['slsh_tel'] == $data['name'] && $value['slsh_password'] == md5($data['pwd'])){
				Session::set('username',$data['name']);
				echo 1;
			}else{
				echo 2;
			}
		}
	}



	public function doregisterUser()
	{  
		$usermodel = new  Usermodel;
		$request = Request::instance();
		$data =$request->param();
		if(empty($data['name']))
		{
			echo '请输入手机号';
		}else{
			$result = $usermodel -> regselect( $data['name']);
			foreach ($result as $key => $v) {
				if($v['slsh_tel'] ==  $data['name']){
					echo 4;
					die();
				}else {
					echo 3;
				}
			}
		}    
	}
	public function doregisterPwd()
	{
		$usermodel = new  Usermodel;
		$request = Request::instance();
		$data =$request->param();
		if(empty($data['pwd'])){
			echo '请输入密码';
		}else{
			$result = $usermodel -> selectPwd($data['name']);
			if ($result == md5($data['pwd'])) {
				echo 3;
			}
		}
	}
	public function doregisterYzm(){

		if(!captcha_check($_POST['yzm'])){
			echo '验证失败';die();
		}else{
			echo 1;
		}
	}
}
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
class Info extends Controller
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
	//买家信息
	public function seller()
	{
		$result = new Infomodel();
		$people = $result->people();
		$this->assign('people',$people);
		return $this->fetch();
	}
	//卖家信息
	public function buyer()
	{
		$result = new Infomodel();
		$buyers = $result->buyers();
		$this->assign('buyers',$buyers);
		return $this->fetch();
	}
	//删除用户
	public function del()
	{
		$result = new Infomodel();
		$del = $result->del();
		$this->success();
	}

	//信息页面
	public function info()
	{
		$session=Session::get('username');
		$login =$this->user->thirdvalogin($session);
		$this->assign('per',$login['slsh_permissions']);
		return $this->fetch();
	}
}

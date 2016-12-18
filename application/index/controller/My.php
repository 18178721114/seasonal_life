<?php
namespace app\index\Controller;
use think\Controller;
use think\Request;
use think\Session;
use app\index\model\Mymodel;
use app\index\model\Goodmodel;

class My extends Controller
{
	//确认收货
	public function getgood()
	{
		$mymodel = new Mymodel;
		$orderinfo = $mymodel->changefinish();
		if ($orderinfo) {
			$this->success('收货成功');
		}
	}
	//设置默认地址
	public function default()
	{
		$mymodel = new Mymodel;
		$userid = $mymodel->selectuserid();
		$addinfo = $mymodel->selectaddress($userid);
		$update = $mymodel->default();
		$this->success('设置成功');
	}
	//删除地址
	public function deladdress()
	{
		$mymodel = new Mymodel;
		$result = $mymodel->deladdress();
		$this->success('删除成功');
	}
	//添加地址
	public function addaddress()
	{
		
		$mymodel = new Mymodel;
		$userid = $mymodel->selectuserid();
		$data['slsh_thegood_name'] = $_POST['username'];
		$data['slsh_detailed_address'] = $_POST['address'];
		$data['slsh_phone'] = $_POST['phone'];
		$data['slsh_postcode'] = $_POST['code'];
		$data['slsh_userid'] = $userid;
		$result = $mymodel->addaddress($data);
		$this->success('添加成功');

	}
	//修改密码
	public function updatepwd()
	{
		$mymodel = new Mymodel;
		$password = md5($_REQUEST['pwd']);
		$data['slsh_password'] = $password;
		$result = $mymodel->updatepwd($data);
		if ($result) {
			session(null);
			echo 1;
			die();
		}	
	}
	//判断密码
	public function dopwd()
	{
		$mymodel = new Mymodel;
		$result = $mymodel->selectPwd();
		if ($result == md5($_REQUEST['pwd'])) {
			echo 4;
			die();
		}
		echo 2;
		die();
	}
	//修改个人资料
	public function update()
	{
        //dump(request()->file('image'));die;
		if (request()->file('image')) {
          	//echo 999;
			$file = request()->file('image');
          	// 移动到框架应用根目录/public/uploads/ 目录下
			$info = $file->move(ROOT_PATH. 'public' . DS . 'static/goodimg');
			if($info){
				$path1 = '/static/goodimg'; 
				$path6 =  $info->getSaveName();
				$path2 =$path1.'/'.str_replace('\\', '/', $path6);
          		//dump($path2);
				$data['slsh_picture'] = $path2;
			}
		}		
		$mymodel = new  Mymodel;		
		$data['slsh_username'] = $_POST['username'];
		$data['slsh_brithday'] = $_POST['birthday'];
		$data['slsh_sex'] = $_POST['sex'];
		$data['slsh_email'] = $_POST['email'];
		$result = $mymodel->updateinfo($data);
		$this->success('修改成功');
	}
	//充值金额
	public function addmoney()
	{
		$mymodel = new  Mymodel;
		$userid = $mymodel->selectuserid();
		$balance = $mymodel->selectbalance($userid);
		if ($balance == null) {
			$balance = 0;
		} else {
			$balance = $balance[0]['slsh_balance'];
		}
		$data['slsh_toup'] = $_REQUEST['money'];
		$money = $_REQUEST['money'];
		$money = (float)$money;
		if ($balance == null) {
			$data['slsh_balance'] = $money;
		} else {
			$data['slsh_balance'] = $money+$balance;
		}

		$data['slsh_userid'] = $userid;
		$result = $mymodel->addmoney($data);
		$newbalance = $mymodel->selectbalance($userid);

		echo 1;
	} 
	//在线充值页面、查询余额
	public function mypay()
	{
		$mymodel = new  Mymodel;
		$goodmodel = new  Goodmodel;
		$count=$goodmodel->count();
		$this->assign('count',$count);
		$userid = $mymodel->selectuserid();
		$balance = $mymodel->selectbalance($userid);
		if ($balance == null) {
			$balance = 0;
		}else{
			$balance = $mymodel->selectbalance($userid)[0]['slsh_balance'];
		}

		$this->assign('balance',$balance);
		return $this->fetch();
	}
	//我的订单
	public function myorder()
	{
		$mymodel = new  Mymodel;
		$orderinfo = $mymodel->orderinfo();		
		$this->assign('orderinfo',$orderinfo);
		$goodmodel = new  Goodmodel;
		$count=$goodmodel->count();
		$this->assign('count',$count);
		return $this->fetch();
	}
	//流水账页面、信息
	public function mymoney()
	{
		$mymodel = new  Mymodel;
		$goodmodel = new  Goodmodel;
		$count=$goodmodel->count();
		$this->assign('count',$count);
		$userid = $mymodel->selectuserid();
		$balance = $mymodel->selectbalance($userid);
		if ($balance == null) {
			$balance = 0;
		}else{
			$balance = $mymodel->selectbalance($userid)[0]['slsh_balance'];
		}
		$moneyinfo = $mymodel->selectmoney($userid);
		$this->assign('moneyinfo',$moneyinfo);
		$this->assign('balance',$balance);
		return $this->fetch();
	}
	//查询个人资料
	public function myinfo()
	{  
		$goodmodel = new  Goodmodel;
		$count=$goodmodel->count();
		$this->assign('count',$count);
		$mymodel = new  Mymodel;
		$result = $mymodel->selectinfo();
		$this->assign('result',$result);
		return $this->fetch();
	}
	//修改密码页面
	public function mypassword()
	{
		$goodmodel = new  Goodmodel;
		$count=$goodmodel->count();
		$this->assign('count',$count);
		return $this->fetch();
	}
	//地址页面、查找地址
	public function myaddress()
	{
		$goodmodel = new  Goodmodel;
		$count=$goodmodel->count();
		$this->assign('count',$count);
		$mymodel = new  Mymodel;
		$userid = $mymodel->selectuserid();
		$result = $mymodel->selectaddress($userid);
		$this->assign('result',$result);
		return $this->fetch();
	}
}
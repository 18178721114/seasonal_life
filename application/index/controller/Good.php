<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Session;
use app\index\model\Indexmodel;
use app\index\model\Goodmodel;
use app\index\model\Catemodel;
use app\index\model\Mymodel;
use app\index\model\Usermodel;

class Good extends Controller
{
	public $cate;
	public $good;
	public $user;
	public $my;
	//初始化
	public function __construct()
	{
		parent::__construct();

		$this->cate= new Catemodel();
		$this->good= new Goodmodel();
		$this->user = new Usermodel();
		$this->my= new Mymodel();


	}
	//订单详情
	public function orderinfo()
	{
		$goodmodel = new Goodmodel();
		$mymodel = new Mymodel();
		$thegoodinfo = $goodmodel->thegoodinfo();
		$this->assign('thegoodinfo',$thegoodinfo);
		$orderinfo = $goodmodel->ordergoodinfo();
		$this->assign('orderinfo',$orderinfo);
		return $this->fetch();
	}
	//商品信息
	public function goodinfo()
	{	
		$id =input('param.goodid');
		//dump($id);

		$goodmodel = new Goodmodel;
		$indexmodel = new Indexmodel;
		$cont =$goodmodel ->cont($id);
		$num =$goodmodel ->numbera($id);
         //dump($n);die;
		$this->assign('num',$num);
		$this->assign('cont',$cont);
        // dump($cont);die;
		$count=$goodmodel->count();
		$this->assign('count',$count);
		$bigplate = $indexmodel->selectbigplate();
		$goodinfo  = $goodmodel->goodinfo();
		$this->assign('goodinfo',$goodinfo);
		$this->assign('bigplate',$bigplate);

		return $this->fetch();
	}
	//坚果信息
	public function nutinfo()
	{
		$goodmodel = new Goodmodel;
		$indexmodel = new Indexmodel;

		$count=$goodmodel->count();
		$this->assign('count',$count);
		$bigplate = $indexmodel->selectbigplate();
		$nutinfo  = $goodmodel->iteminfo();
		$this->assign('nutinfo',$nutinfo);
		$this->assign('bigplate',$bigplate);
		return $this->fetch();
	}
	//购物车
	public function shopcar()
	{

		$goodmodel = new Goodmodel;
		//dump(session::get('username'));die();
		if(!empty(session::get('username'))){
			$result=$goodmodel->addgoodsel(session::get('username')); 

			$this->assign('addgoodname',$result); 
		}else{
			//dump(session::get('goodid'));
			$this->assign('goodname',session::get('goodname'));
			$this->assign('goodid',session::get('goodid'));
			$this->assign('goodprice',session::get('goodprice'));
			$this->assign('goodspec',session::get('goodspec'));
			$this->assign('goodsrc',session::get('goodsrc'));
			$this->assign('goodnum',session::get('goodnum'));
		}
		$this->assign('session',session::get('username'));
		$this->assign('goodname',session::get('goodname'));
		return $this->fetch();
	}
	//加入购物车
	public function shopcar1()
	{
		$goodmodel = new Goodmodel;
		$session = session::get('username');
		$request = Request::instance();
		$a =$request->param();
       // dump($a);
       // 登录状态时加入购物车
		if(!empty(session::get('username'))){
			$data['slsh_shopgood'] =$a['goodname'];
			$data['slsh_pirce'] =$a['goodprice'];
			$data['slsh_num'] =$a['goodnum'];
			$data['slsh_goodid'] =$a['goodid'];
			$data['slsh_picture'] =$a['goodsrc'];
			$data['slsh_spec'] =$a['goodspec'];
			$data['slsh_tel'] =session::get('username');
			$goodinfo  = $goodmodel->addgood($data);
			if($goodinfo){
				echo 1;die();
			}          

		}
       	//dump(empty(session::get('goodname')));die();
       	//未登录状态加入购物车
		if(empty(session::get('goodname'))){
			$goodname[]['goodname'] =$a['goodname'];
			session::set('goodname',$goodname);
			$goodid[]['goodid'] =$a['goodid'];
			session::set('goodid',$goodid);
			$goodprice[]['goodprice'] =$a['goodprice'];
			session::set('goodprice',$goodprice);
              //dump(session::get('goodprice'));die;
			$goodspec[]['goodspec'] =$a['goodspec'];
			session::set('goodspec',$goodspec);
			$goodsrc[]['goodsrc'] =$a['goodsrc'];
			session::set('goodsrc',$goodsrc);
			$goodnum[]['goodnum'] =$a['goodnum'];
			session::set('goodnum',$goodnum);
		}else{
			$goodname = session::get('goodname');
			$goodname[]['goodname'] = $a['goodname'];
			session::set('goodname',$goodname);
			$goodid = session::get('goodid');
			$goodid[]['goodid'] = $a['goodid'];
			session::set('goodid',$goodid);
                 //dump(session::get('goodprice'));die;
			$goodprice = session::get('goodprice');
			$goodprice[]['goodprice'] = $a['goodprice'];
			session::set('goodprice',$goodprice);
			$goodspec = session::get('goodspec');
			$goodspec[]['goodspec'] = $a['goodspec'];
			session::set('goodspec',$goodspec);
			$goodsrc = session::get('goodsrc');
			$goodsrc[]['goodsrc'] = $a['goodsrc'];
			session::set('goodsrc',$goodsrc);
			$goodnum = session::get('goodnum');
			$goodnum[]['goodnum'] = $a['goodnum'];
			session::set('goodnum',$goodnum);
		}

		echo  1;
	}
	//去支付
	public function order()
	{		
		$session=Session::get('username');
        //验证是否登录
		if(empty($session)){
			$this->error('请先登陆','index/user/login');
		}
		$user = $this->user->id($session);
	 	    //dump($user);
		$address =$this->my->orderaddress1($user['slsh_userid']);
		$oider=input('param.oider');

		if(!empty($oider)){
			$this->assign('qwa',1);
			$shopcar = $this->good->addgoodsel1($oider);
			$this->assign('price',$shopcar[0]['slsh_goodprice']);
			$this->assign('shopcar',$shopcar);
			$this->assign('address',$address);
		}else{
            //echo 11;die();
           // dump($address);die;
			$this->assign('qwa',2);
			$shopcar = $this->good->addgoodsel($user['slsh_tel']);
            //dump($shopcar);
			$price = 0;
			for($a=0;$a<count($shopcar);$a++){			
				$price += substr($shopcar[$a]['slsh_pirce'],3)*$shopcar[$a]['slsh_num'];
           //$b += $price;
			}
			$this->assign('price',$price);
			$this->assign('shopcar',$shopcar);

			$this->assign('address',$address);
		}
		return $this->fetch();
	}
	//订单信息
	public function order1()
	{
		
		$session=Session::get('username');
        //验证是否登录
		if(empty($session)){
			$this->error('请先登陆','index/user/login');
		}


		$user = $this->user->id($session);
	 	    //dump($user);
		$address =$this->my->orderaddress1($user['slsh_userid']);
		$oider=input('param.oider');

		if(!empty($oider)){
			$this->assign('qwa',1);
			$shopcar = $this->good->addgoodsel2($oider);
			$this->assign('price',$shopcar[0]['slsh_goodprice']);
			$this->assign('shopcar',$shopcar);
			$this->assign('address',$address);
		}else{
			$this->assign('qwa',2);
			$shopcar = $this->good->addgoodsel($user['slsh_tel']);
			$price = 0;
			for($a=0;$a<count($shopcar);$a++){			
				$price += substr($shopcar[$a]['slsh_pirce'],3)*$shopcar[$a]['slsh_num'];
			}
			$this->assign('price',$price);
			$this->assign('shopcar',$shopcar);
			$this->assign('address',$address);
		}
		return $this->fetch('order');
	}
	//商品确认
	public function pay()
	{   
		$session =session::get('username');
		$user = $this->user->id($session);
		$money = $this->user->money($user['slsh_userid']);
		if(empty($money[0]['slsh_balance'])){
			$this->error('你的余额为零请去充值','my/mypay');
		}
		$orderid=input('param.orderid');
		$mymodel = new  Mymodel;
		//dump($_POST);die;
		$order = time();
		$order = date('YmdHi',$order);
		
		$address =$this->my->orderaddress1($user['slsh_userid']);
		//dump($address);die();
		if(empty($address['slsh_thegood_name'])){
			$this->error('请输入收货人','my/myaddress');
		}
		if(empty($address['slsh_detailed_address'])){
			$this->error('请输入地址','my/myaddress');
		}
		if(empty($address['slsh_phone'])){
			$this->error('请输入手机号','my/myaddress');
		}
		if(empty($address['slsh_postcode'])){
			$this->error('请输入邮编','my/myaddress');
		}
		
		
		if($orderid){
			$userid = $mymodel->selectuserid();
			$order =  $this->good->ordernum($orderid);
			$this->assign('order',$order);
			$balance = $mymodel->selectbalance($userid);
			if ($balance == null) {
				$balance = 0;
			}else{
				$balance = $mymodel->selectbalance($userid)[0]['slsh_balance'];
			}
			$this->assign('balance',$balance);
			$zong=0;
			$this->assign('zong',$zong);

		}else{
			if($_POST['zong'] ==0){
				$this->error('请选择商品','index/index');
			}
			for($a=0;$a<count($_POST['num']);$a++){
				$data['slsh_pic']=$_POST['picture'][$a];
				$data['slsh_spec']=$_POST['spec'][$a];
				$data['slsh_num']=$_POST['num'][$a];
				$data['slsh_price']=$_POST['price'][$a];
				$data['slsh_good']=$_POST['good'][$a];
				$data['slsh_tel']=$session ;
				$data['slsh_address']=$address['slsh_detailed_address'];
				$data['slsh_order']=$order;
				$shopcar = $this->good->addorder($data);
			}
			$this->good->shopcardel1($session);
			$newbalance = $this->my->selectbalance($user['slsh_userid']);
			$this->assign('balance',$newbalance[0]['slsh_balance']);
         //$newbalance[0]['slsh_balance']
			$this->assign('zong',$_POST['zong']);
			$this->assign('order',$order);

		}  
		return $this->fetch();
	}
	//删除购物车
	public function gooddel()
	{
		$good =input('param.good');
		$goo=$this->good->shopcardel($good);
		if($goo){
			$this->success('删除物品成功');
		}else{
			$this->error('删除物品失败');
		}
	}
	//商品支付
	public function goodpay()
	{
		$mymodel = new  Mymodel;
		$goodmodel = new  Goodmodel;
		//未支付去支付
		if(substr($_POST['zong'],0,3) =='￥'){
			$zong =substr($_POST['zong'],3);
			$balance = $_POST['balance'];
			if($_POST['balance']==0){
				$this->error('对不起你的余额为零,请去充值','my/mypay');
			}
			if($zong > $balance){
				$this->error('对不起你的余额不足,请去充值','my/mypay');
			}
			$balance = $_POST['balance'] - $zong;
			$data['slsh_balance'] = $balance;
			$data['slsh_spending'] = $zong;
			$userid = $mymodel->selectuserid();
			$data['slsh_userid'] = $userid;
			$result = $mymodel->addmoney($data);
			$neworder = $goodmodel->stateinfo();
			$changestate = $goodmodel->changestate1($_POST['id']);
			$this->success('支付成功','index/my/myorder');

		}else{
       	//直接支付
			$zong =$_POST['zong'];
			$balance = $_POST['balance'];
			if($_POST['balance']==0){
				$this->error('对不起你的余额为零,请去充值','my/mypay');
			}
			if($zong > $balance){
				$this->error('对不起你的余额不足,请去充值','my/mypay');
			}
			$balance = $_POST['balance'] - $zong;
			$data['slsh_balance'] = $balance;
			$data['slsh_spending'] = $zong;
			$userid = $mymodel->selectuserid();
			$data['slsh_userid'] = $userid;
			$result = $mymodel->addmoney($data);
			$neworder = $goodmodel->stateinfo();
			$changestate = $goodmodel->changestate($neworder[0]['slsh_order']);
			$this->success('支付成功','index/my/myorder');
		}
	}
}
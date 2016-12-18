<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\model\Indexmodel;
use app\admin\model\Catemodel;
use app\admin\model\Goodmodel;
use app\admin\model\Usermodel;
use think\Session;

class Index extends Controller
{

    public $cate;
    public $good;
    public $user;


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
    //后台首页页面
    public function index()
    {
     $session=Session::get('username');
     $login =$this->user->valogin($session);
     $this->assign('per',$login['slsh_permissions']);
     return $this->fetch();
    }
    //后台信息页面
    public function info()
    {
        $session=Session::get('username');
        $login =$this->user->thirdvalogin($session);
        $this->assign('per',$login['slsh_permissions']);
        return $this->fetch();
    }
    //退出
    public function logoout()
    {
     session(null);
     $this->error('退出成功','index/index/index');
    }
    //
    public function replace()
    {      
        file_put_contents('application/com.txt',1111);
        echo 999;die();
        $str = file_get_contents('common11.php');
        foreach($_POST as $key=>$val){
            $pattern="/define\('$key',.*?\);/";
            $replace="define('$key',$val);";
            $str = preg_replace($pattern, $replace, $str);
        }
        file_put_contents('com.php',1111);
        		//header('location:admin_main.php');
    }
}


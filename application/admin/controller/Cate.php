<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\model\Indexmodel;
use app\admin\model\Catemodel;
use app\admin\model\Goodmodel;
use app\admin\model\Usermodel;
use think\Session;
class Cate extends Controller
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
	//显示版块
	 public function cate()
    {
        //$plate = new Catemodel();

        $bigplate = $this->cate->bigCateSle();
        $smallplate = $this->cate->smallCateSle();
        $page = $this->cate ->page();
        $this->assign('page',$page);
        $this->assign('smallplate',$smallplate); 
        $this->assign('plate',$bigplate);
    	return $this->fetch();
    }
    //删除版块
    public function deletecate(){
         $plate = new Catemodel();
    	$del = input('param.del');
        $delplate = $plate ->delCate($del);
        if($delplate){
        	$this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    //添加版块
    public  function addcate()
    {

      $plate = new Catemodel();
      $smallplate = $plate ->smallCateSle();
      
      if($_POST['mingcheng1']>1){
      	
	      	foreach ($smallplate as $key => $value) {
	      	 if($value['slsh_class'] == $_POST['mingcheng']){
	      	 	 $this->error('该板块已存在');
	      	 }
	      }
	      if(!empty($_POST['sort'])){
	      	$data['slsh_class'] = $_POST['sort'];
	      	 	 $data['slsh_bigid'] = $_POST['mingcheng1'];
	      	 	 $addcate = $plate -> addCate($data);
	      	 	
	      	 	 if($addcate){
	      	 	 	
	                   $this->success('添加品类成功');
	      	 	 }else{
	                  $this->error('添加品类失败');
	                  
	      	 	 }
	      }else{
	      	    $this->error('请填写内容');
	      	 	}


	             
      }else{
      	
      	$this->error('请选择添加版块');
      }
      
    }
}
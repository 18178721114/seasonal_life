<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\model\Indexmodel;
use app\admin\model\Catemodel;
use app\admin\model\Goodmodel;
use app\admin\model\Usermodel;
use think\Session;

class Good extends Controller
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
	 //显示上架商品
	public function pergood()
	{ 
		$show=$this->good->showgood();
		$this->assign('show',$show);
		return $this->fetch();
	}
	//显示下架商品
	public function downgood()
	{ 
		$show=$this->good->downgood();
		$this->assign('show',$show);
		return $this->fetch();
	}

    //添加
	public function add()
	{
		$smallplate = $this->cate ->smallCateSle();
		$this->assign('smallplate',$smallplate); 
		return $this->fetch();
	}
	//显示首页
	public function show(){
		$show =input('param.showid');
		$re = $this->good->show($show);
		if($re){
			$this->success('在首页显示成功');
		}else{
			$this->error('在首页显示失败');	
		}

	}
	//不显示首页
	public function show1(){
		$show =input('param.showid');
		$re = $this->good->show1($show);
		if($re){
			$this->success('在首页列表成功');
		}else{
			$this->error('在首页列表失败');	
		}
		
	}
	//显示详情
	public function show2()
	{
		$show =input('param.showid');
		$re = $this->good->show2($show);
		$re1=$this->cate->goodcate($re['slsh_category']);
		$this->assign('sow1',$re1);
		$this->assign('sow',$re);
		return $this->fetch();
		
	}
	//修改信息
	public function xiugai()
	{
		$xiugai=input('param.xiugaiid');
		$data['slsh_goodid'] = $xiugai;
		$data['slsh_goodname']=$_POST['goodname'];
		$data['slsh_goodprice']=$_POST['goodprice'];
		$data['slsh_discount']=$_POST['discount'];
		$data['slsh_spec']=$_POST['spec'];
		$data['slsh_orign']=$_POST['orign'];
		$re = $this->good->xiugai($data);
		
		if($re){
			$this->success('修改成功','good/pergood');
		}else{
			$this->success('修改失败');
		}
		
	}

   //添加照片
	public function addphoto()
	{		
       // 获取表单上传文件
		if(!empty(request()->file('image'))){
			$b =request()->file('image');
			if(!empty(request()->file('image'))){				
				$files = request()->file('image');
				foreach($files as $file){
           		// 移动到框架应用根目录/public/uploads/ 目录下
					$info = $file->move(ROOT_PATH . 'public' . DS . 'static/goodimg');
					if($info){
						$path = $info->getSaveName();
						$p = str_replace('\\','/',$path);
						$paths[] = '/static/goodimg/'.$p;
					}else{
             // 上传失败获取错误信息
						echo $file->getError();
					}
				}				
				$count = count($paths);				
				$addid1 = input('param.addid1');
				$data['slsh_goodid'] = $addid1;
				if($count == 1){
					$data['slsh_picture'] = $paths[0];					
					$addphoto=$this->good->addphoto($data);
				}elseif($count == 2){
					$data['slsh_picture1'] = $paths[1];
					$data['slsh_picture'] = $paths[0];
					$addphoto=$this->good->addphoto($data);
				}elseif($count ==3) {
					$data['slsh_picture'] = $paths[0];
					$data['slsh_picture1'] = $paths[1];
					$data['slsh_picture2'] = $paths[2];
					$addphoto=$this->good->addphoto($data);
				}elseif($count == 4){
					$data['slsh_picture'] = $paths[0];
					$data['slsh_picture1'] = $paths[1];
					$data['slsh_picture2'] = $paths[2];
					$data['slsh_picture3'] = $paths[3];
					$addphoto=$this->good->addphoto($data);
				}elseif($count ==5){
					$data['slsh_picture'] = $paths[0];
					$data['slsh_picture1'] = $paths[1];
					$data['slsh_picture2'] = $paths[2];
					$data['slsh_picture3'] = $paths[3];
					$data['slsh_photo'] = $paths[4];
					$addphoto=$this->good->addphoto($data);
				}elseif($count ==6){
					$data['slsh_picture'] = $paths[0];
					$data['slsh_picture1'] = $paths[1];
					$data['slsh_picture2'] = $paths[2];
					$data['slsh_picture3'] = $paths[3];
					$data['slsh_photo'] = $paths[4];
					$data['slsh_photo1'] = $paths[5];
					$addphoto=$this->good->addphoto($data);
				}elseif($count ==7){
					$data['slsh_picture'] = $paths[0];
					$data['slsh_picture1'] = $paths[1];
					$data['slsh_picture2'] = $paths[2];
					$data['slsh_picture3'] = $paths[3];
					$data['slsh_photo'] = $paths[4];
					$data['slsh_photo1'] = $paths[5];
					$data['slsh_photo2'] = $paths[6];
					$addphoto=$this->good->addphoto($data);
				}else{
					$data['slsh_picture'] = $paths[0];
					$data['slsh_picture1'] = $paths[1];
					$data['slsh_picture2'] = $paths[2];
					$data['slsh_picture3'] = $paths[3];
					$data['slsh_photo'] = $paths[4];
					$data['slsh_photo1'] = $paths[5];
					$data['slsh_photo2'] = $paths[6];
					$data['slsh_photo3'] = $paths[7];
					$addphoto=$this->good->addphoto($data);
				}				
				if($addphoto){
					$this->success('添加商品成功','Good/pergood');
				}else{
					$this->error('添加商品失败','good/add');
				}	
			}else{
				$this->error('请至少添加一张商品照片');
			}
		}
		$addid = input('param.addid');
        // dump($addid);
		$this->assign('addid',$addid);
		return $this->fetch();
	}
    //添加商品信息
	public function addgood()
	{
		if(!empty($_POST['title'])){
			if(!empty($_POST['pirce'])){
				if(!empty($_POST['origin'])){
					if(!empty($_POST['mingcheng'])){
						if(!empty($_POST['spec'])){
							$data['slsh_goodname'] = $_POST['title'];
							$data['slsh_goodprice'] = $_POST['pirce'];
							$data['slsh_orign'] = $_POST['origin'];
							$data['slsh_category'] = $_POST['mingcheng'];
							$data['slsh_spec'] = $_POST['spec'];
							$addgood = $this->good->addgood($data);
							$addgoodSel = $this->good->addgoodSel($_POST['title']);
							if($addgood){
								$this->success('下一步','Good/addphoto?addid='.$addgoodSel['slsh_goodid']);
							}else{
								$this->error('添加品类失败');
							}
						}else{
							$this->error('添加商品规格');
						}
					}else{
						$this->error('请选择品类');
					}
				}else{
					$this->error('请输入商品产地');
				}
			}else{
				$this->error('请输入商品价格');
			}
		}else{
			$this->error('请输入商品名称');
		} 
	}
	//折扣页面
	public function discount()
	{
		$show=$this->good->discountgood();
		$this->assign('show',$show);
		return $this->fetch();
		
	}
	//折扣
	public function zhekou()
	{
		$zhekouid = input('param.zhekouid');
		if(empty($_POST['pirce'])){
			$this->error('请添加打折价格');
		}else{
			$data['slsh_goodid'] = $zhekouid;
			$data['slsh_shelf'] =2;
			$data['slsh_discount'] = $_POST['pirce'];
			$show=$this->good->discountprice($data);
			if($show){
				$this->success('打折成功','good/discount');
			}else{
				$this->error('打折失败');
			}
		}
		
		
	}
	//商品下架
	public function downShelf()
	{     
		$data= input('param.downid');
		$show=$this->good->down($data);
		if($show){
			$this->success('下架成功','good/downgood');
		}else{
			$this->error('下架失败');
		}

	}
	//商品上架
	public function upShelf()
	{     
		$data= input('param.downid');
		$show=$this->good->up($data);
		if($show){
			$this->success('上架成功','good/pergood');
		}else{
			$this->error('上架失败');
		}

	}
	//还原价格
	public function restore()
	{
		$restore=input('param.restoreid');
		$show=$this->good->restore($restore);
		if($show){
			$this->success('还原价格成功','good/pergood');
		}else{
			$this->error('还原价格失败');
		}
	}
	//删除
	public function delete()
	{
		$delete=input('param.delid');
		$show=$this->good->del($delete);
		if($show){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
	 //显示上架商品
	public function thirdpergood()
	{ 
		$show=$this->good->thirdshowgood();
		$this->assign('show',$show);
		$session=Session::get('username');
		$login =$this->user->thirdvalogin($session);
		$this->assign('per',$login['slsh_permissions']);
		return $this->fetch();
	}
	//显示下架商品
	public function thirddowngood()
	{ 
		$show=$this->good->thirddowngood();
		$this->assign('show',$show);
		return $this->fetch();
	}
    //添加商品
	public function thirdadd()
	{
		$smallplate = $this->cate ->smallCateSle();
		$this->assign('smallplate',$smallplate); 
		return $this->fetch();
	}
	//添加照片
	public function thirdaddphoto()
	{		
       	// 获取表单上传文件
		if(!empty(request()->file('image'))){
			$b =request()->file('image');
			if(!empty(request()->file('image'))){				
				$files = request()->file('image');
				foreach($files as $file){
           // 移动到框架应用根目录/public/uploads/ 目录下
					$info = $file->move(ROOT_PATH . 'public' . DS . 'static/thirdgoodimg');
					if($info){
						$path = $info->getSaveName();
						$p = str_replace('\\','/',$path);
						$paths[] = '/static/thirdgoodimg/'.$p;

					}else{
             // 上传失败获取错误信息
						echo $file->getError();
					}
				}
				
				$count = count($paths);
				
				$addid1 = input('param.addid1');
				$data['slsh_goodid'] = $addid1;

				if($count == 1){
					$data['slsh_picture'] = $paths[0];
					
					$addphoto=$this->good->thirdaddphoto($data);
				}elseif($count == 2){
					$data['slsh_picture1'] = $paths[1];
					$data['slsh_picture'] = $paths[0];
					$addphoto=$this->good->thirdaddphoto($data);
				}elseif($count ==3) {
					$data['slsh_picture'] = $paths[0];
					$data['slsh_picture1'] = $paths[1];
					$data['slsh_picture2'] = $paths[2];
					$addphoto=$this->good->thirdaddphoto($data);
				}elseif($count == 4){
					$data['slsh_picture'] = $paths[0];
					$data['slsh_picture1'] = $paths[1];
					$data['slsh_picture2'] = $paths[2];
					$data['slsh_picture3'] = $paths[3];
					$addphoto=$this->good->thirdaddphoto($data);
				}elseif($count ==5){
					$data['slsh_picture'] = $paths[0];
					$data['slsh_picture1'] = $paths[1];
					$data['slsh_picture2'] = $paths[2];
					$data['slsh_picture3'] = $paths[3];
					$data['slsh_photo'] = $paths[4];
					$addphoto=$this->good->thirdaddphoto($data);
				}elseif($count ==6){
					$data['slsh_picture'] = $paths[0];
					$data['slsh_picture1'] = $paths[1];
					$data['slsh_picture2'] = $paths[2];
					$data['slsh_picture3'] = $paths[3];
					$data['slsh_photo'] = $paths[4];
					$data['slsh_photo1'] = $paths[5];
					$addphoto=$this->good->thirdaddphoto($data);
				}elseif($count ==7){
					$data['slsh_picture'] = $paths[0];
					$data['slsh_picture1'] = $paths[1];
					$data['slsh_picture2'] = $paths[2];
					$data['slsh_picture3'] = $paths[3];
					$data['slsh_photo'] = $paths[4];
					$data['slsh_photo1'] = $paths[5];
					$data['slsh_photo2'] = $paths[6];
					$addphoto=$this->good->thirdaddphoto($data);
				}else{
					$data['slsh_picture'] = $paths[0];
					$data['slsh_picture1'] = $paths[1];
					$data['slsh_picture2'] = $paths[2];
					$data['slsh_picture3'] = $paths[3];
					$data['slsh_photo'] = $paths[4];
					$data['slsh_photo1'] = $paths[5];
					$data['slsh_photo2'] = $paths[6];
					$data['slsh_photo3'] = $paths[7];
					$addphoto=$this->good->thirdaddphoto($data);
				}
				if($addphoto){
					$this->success('添加商品成功','Good/thirdpergood');
				}else{
					$this->error('添加商品失败','good/thirdadd');
				}	
			}else{
				$this->error('请至少添加一张商品照片');
			}
		}


		$addid = input('param.addid');
        // dump($addid);
		$this->assign('addid',$addid);

		return $this->fetch();
	}
    //添加商品信息
	public function thirdaddgood()
	{
		if(!empty($_POST['title'])){
			if(!empty($_POST['pirce'])){
				if(!empty($_POST['origin'])){
					if(!empty($_POST['mingcheng'])){
						if(!empty($_POST['spec'])){

							$data['slsh_goodname'] = $_POST['title'];
							$data['slsh_goodprice'] = $_POST['pirce'];
							$data['slsh_orign'] = $_POST['origin'];
							$data['slsh_category'] = $_POST['mingcheng'];
							$data['slsh_spec'] = $_POST['spec'];

							$addgood = $this->good->thirdaddgood($data);
							$addgoodSel = $this->good->thirdaddgoodSel($_POST['title']);


							if($addgood){


								$this->success('下一步','Good/thirdaddphoto?addid='.$addgoodSel['slsh_goodid'])
								;
							}else{
								$this->error('添加品类失败');
							}

						}else{
							$this->error('添加商品规格');
						}

					}else{
						$this->error('请选择品类');
					}
				}else{
					$this->error('请输入商品产地');
				}

			}else{
				$this->error('请输入商品价格');
			}
		}else{
			$this->error('请输入商品名称');
		} 
	}
	//折扣页面
	public function thirddiscount()
	{
		$show=$this->good->thirddiscountgood();
		$this->assign('show',$show);
		return $this->fetch();
		
	}
	//折扣
	public function thirdzhekou()
	{
		$zhekouid = input('param.zhekouid');

		if(empty($_POST['pirce'])){
			$this->error('请添加打折价格');

		}else{
			$data['slsh_goodid'] = $zhekouid;
			$data['slsh_shelf'] =2;
			$data['slsh_discount'] = $_POST['pirce'];
			$show=$this->good->thirddiscountprice($data);
			if($show){
				$this->success('打折成功','good/thirddiscount');
			}else{
				$this->error('打折失败');
			}
		}
		
		
	}
	//商品下架
	public function thirddownShelf()
	{     
		$data= input('param.downid');
		$show=$this->good->thirddown($data);
		if($show){
			$this->success('下架成功','good/thirddowngood');
		}else{
			$this->error('下架失败');
		}

	}
	//商品上架
	public function thirdupShelf()
	{     
		$data= input('param.downid');
		$show=$this->good->thirdup($data);
		if($show){
			$this->success('上架成功','thirdgood/pergood');
		}else{
			$this->error('上架失败');
		}

	}
	//还原价格
	public function thirdrestore()
	{
		$restore=input('param.restoreid');

		$show=$this->good->thirdrestore($restore);
		if($show){
			$this->success('还原价格成功','good/thirdpergood');
		}else{
			$this->error('还原价格失败');
		}

	}
	//删除
	public function thirddelete()
	{
		$delete=input('param.delid');
		$show=$this->good->thirddel($delete);
		if($show){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
	//显示首页
	public function thirdshow(){
		$show =input('param.showid');
		$re = $this->good->thirdshow($show);
		if($re){
			$this->success('在首页显示成功');
		}else{
			$this->error('在首页显示失败');	
		}

	}
	//不显示首页
	public function thirdshow1(){
		$show =input('param.showid');
		$re = $this->good->thirdshow1($show);
		if($re){
			$this->success('在首页列表成功');
		}else{
			$this->error('在首页列表失败');	
		}
		
	}
	//显示详情
	public function thirdshow2()
	{
		$show =input('param.showid');
		$re = $this->good->thirdshow2($show);
		$re1=$this->cate->goodcate($re['slsh_category']);
		$this->assign('sow1',$re1);
		$this->assign('sow',$re);
		return $this->fetch();
		
	}
	//修改信息
	public function thirdxiugai()
	{
		$xiugai=input('param.xiugaiid');
		$data['slsh_goodid'] = $xiugai;
		$data['slsh_goodname']=$_POST['goodname'];
		$data['slsh_goodprice']=$_POST['goodprice'];
		$data['slsh_discount']=$_POST['discount'];
		$data['slsh_spec']=$_POST['spec'];
		$data['slsh_orign']=$_POST['orign'];
		$re = $this->good->thirdxiugai($data);
		
		if($re){
			$this->success('修改成功','good/thirdpergood');
		}else{
			$this->success('修改失败');
		}
		
	}

}
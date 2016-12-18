<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Session;
use app\index\model\Indexmodel;
use app\index\model\Goodmodel;
use app\index\model\Catemodel;

class Index extends controller
{
    //商品列表
	public function list()
    {
        $goodmodel = new Goodmodel;
        $catemodel = new Catemodel;
        $indexmodel = new Indexmodel;
        $bigplate = $indexmodel->selectbigplate();
        $smallplate = $indexmodel->selectsmallplate();
        $this->assign('smallplate',$smallplate);
        $this->assign('bigplate',$bigplate);
        $good = $goodmodel->goodshelf();
        $this->assign('good',$good);
        $good1 = $goodmodel->goodshelf1();
        $this->assign('good1',$good1);
        $plateid = input('param.plateid');
        $this->assign('plateid',$plateid);
        $dis = $goodmodel->selectDis();
        $this->assign('dis',$dis);
        $count=$goodmodel->count();
        $this->assign('count',$count);

        return $this->fetch();
    }
    //前台首页
    public function index()
    {
    	$indexmodel = new Indexmodel;
    	$goodmodel = new Goodmodel;
    	$catemodel = new Catemodel;
    	$bigplate = $indexmodel->selectbigplate();
    	$this->assign('bigplate',$bigplate);
    	$cate =$catemodel->goodshow();
    	//dump($cate);
    	$good =$goodmodel->goodshow1();
    	//dump($good);
    	$this->assign('cate',$cate);
    	$this->assign('good',$good);
    	$cate2 =$catemodel->giftshow();
    	$good2 =$goodmodel->goodshow2();
    	$this->assign('cate2',$cate2);
    	$this->assign('good2',$good2);
    	$cate3 = $catemodel->nutshow();
    	$good3 =$goodmodel->goodshow3();
    	$this->assign('cate3',$cate3);
    	$this->assign('good3',$good3);
        $count=$goodmodel->count();
        $this->assign('count',$count);
        return $this->fetch();
    }

}

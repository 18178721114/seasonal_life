<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\Session;

class Goodmodel extends Model
{
    //查询评论条数
     public function numbera($data)
     {
        return Db::table('slsh_comment')->where('slsh_comment_goodid',$data)->count('slsh_comment_goodid');
     }
    //显示商品评论
    public function cont($data)
    {
        return  Db::name('comment')->where('slsh_comment_goodid',$data)->select();
    }
    //商品评论
    public function content($data)
    {
         return Db::table('slsh_comment')->insert($data);
    }
    //查询商品id
    public function iddi($data)
    {
        $data1 =Db::name('order')->where('slsh_oid',$data)->find();
        return  Db::name('goods')->where('slsh_goodname',$data1['slsh_good'])->find();
    }
    //查询购物车数量
    public function count()
    {
       $usertel = Session::get('username');
       return Db::table('slsh_shopcar')->where('slsh_tel',$usertel)->count('slsh_tel');
    }
    //未支付的去支付
    public function nullgoodpay($data)
    {
          return  Db::name('order')->where('slsh_oid',$data)->where('slsh_state',0)->find();
    }
    //查找订单
    public function ordernum($data)
    {
        return  Db::name('order')->where('slsh_oid',$data)->where('slsh_state',0)->find();
    }
    //订单页商品信息
    public function ordergoodinfo()
    {
        $orderid = input('param.orderid');
        return  Db::name('order')->where('slsh_oid',$orderid)->select();
    }
    //订单详情页的收货人信息
    public function thegoodinfo()
    {
        $usertel = Session::get('username');
        $userid = Db::table('slsh_user')->where('slsh_tel',$usertel)->value('slsh_userid');
        return Db::name('address')->where('slsh_userid',$userid)->where('slsh_default',1)->find();
    }
    //订单支付后更改状态为已支付
    public function changestate($neworder)
    {
        return Db::query("update slsh_order set slsh_state = 1 where slsh_order = $neworder");
    }
    //未支付 支付后更改状态
    public function changestate1($neworder)
    {
        return Db::query("update slsh_order set slsh_state = 1 where slsh_oid= $neworder");
    }
    //订单支付后查询最新订单的订单号
    public function stateinfo()
    {
        $usertel = Session::get('username');
        return Db::query("select slsh_order from slsh_order where slsh_tel = $usertel order by slsh_oid desc limit 1 ");
    }
    public function shopcardel($data)
    {
        return Db::table('slsh_shopcar')->where('slsh_sid',$data)->delete();
    }
    //删除购物车里的商品
    public function shopcardel1($data)
    {
       return Db::table('slsh_shopcar')->where('slsh_tel',$data)->delete();
    }
    //添加购物车
    public function addorder($data)
    {
      return Db::table('slsh_order')->insert($data);
    }
    //加入购物车
    public function addgood($data)
    {
        return Db::table('slsh_shopcar')->insert($data);
    }
    //查询购物车
    public function addgoodsel($data)
    {
         return  Db::name('shopcar')->where('slsh_tel',$data)->select();
    }
    //立即查询物品信息
    public function addgoodsel1($data)
    {
         return  Db::name('goods')->where('slsh_goodid',$data)->select();
    }
    //第三方立即查询物品信息
    public function addgoodsel2($data)
    {
         return  Db::name('items')->where('slsh_goodid',$data)->select();
    }
	//查询goods表里面的折扣商品的信息
	public function selectDis()
	{
		return Db::name('goods')->where('slsh_shelf',2)->select();
	}
	//查询goods表里面上架的信息
	public function goodshelf()
	{
		return Db::name('goods')->where('slsh_shelf',1)->select();
	}
	//查询items表里面上架的信息
	public function goodshelf1()
	{
		return Db::name('items')->where('slsh_shelf',1)->select();
	}
	//查询goods表显示在首页的信息
    public function goodshow1()
    {
        return  Db::name('goods')->where('slsh_show',1)->where('slsh_shelf',1)->select();
    }
    public function goodshow2()
    {
        return  Db::name('goods')->where('slsh_show',1)->where('slsh_shelf',1)->select();
    }
    //查询items表显示在首页的信息
     public function goodshow3()
    {
        return  Db::name('items')->where('slsh_show',1)->where('slsh_shelf',1)->select();
    }
    //根据首页物品id查询对应的goods信息
    public function goodinfo()
    {
    	$goodid = input('param.goodid');
    	return  Db::name('goods')->where('slsh_goodid',$goodid)->select();
    }
     //根据首页物品id查询对应的items信息
     public function iteminfo()
    {
    	$goodid = input('param.itemid');
    	return  Db::name('items')->where('slsh_goodid',$goodid)->select();
    }

}
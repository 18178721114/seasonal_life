<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Goodmodel extends Model
{   
     //查询购物车
    public function shopshow($data)
    {
        return Db::name('shopcar')->where('slsh_tel','=',$data)->select();
    }
	//插入商品信息
    public function addgood($data)
    {
    	return Db::table('slsh_goods')->insert($data);
    }
    //查询商品id
    public function addgoodSel($data)
    {
    	return Db::table('slsh_goods')->where('slsh_goodname',$data)->find();
    }
    //显示上架商品分页
    public function showgood()
    {
     return  Db::name('goods')->where('slsh_shelf','=',1)->paginate(10);
    }
    //显示下架商品分页
    public function downgood()
    {
     return  Db::name('goods')->where('slsh_shelf','=',0)->paginate(10);
    }
    //下架商品
    public function down($data)
    {
    	return Db::table('slsh_goods')->where('slsh_goodid',$data)->setField('slsh_shelf', '0');
    }
    //上架商品
     public function up($data)
    {
    	return Db::table('slsh_goods')->where('slsh_goodid',$data)->setField('slsh_shelf', '1');
    }
    //添加照片
    public function addphoto($data)
    {
    	return Db::table('slsh_goods')->where('slsh_goodid',$data['slsh_goodid'])->update($data);

    }
    //显示折扣
    public function discountgood()
    {
        return  Db::name('goods')->where('slsh_shelf','=',2)->paginate(10);
    }
    //折扣
    public  function discountprice($data)
    {
        return Db::table('slsh_goods')->where('slsh_goodid',$data['slsh_goodid'])->update($data);
    }
    //还原价格
    public function restore($data)
    {
        return Db::table('slsh_goods')->where('slsh_goodid',$data)->setField('slsh_shelf', '1');
    }
    //删除
    public function del($data)
    {
        return Db::table('slsh_goods')->where('slsh_goodid',$data)->delete();
    }
    //显示首页
     public function show($data)
    {
        return Db::table('slsh_goods')->where('slsh_goodid',$data)->setField('slsh_show', '1');
    }
    //显示详情页
     public function show1($data)
    {
        return Db::table('slsh_goods')->where('slsh_goodid',$data)->setField('slsh_show', '0');
    }
    //显示商品信息
    public function show2($data)
    {
        return Db::table('slsh_goods')->where('slsh_goodid',$data)->find();
    }
    //修改商品信息
    public  function xiugai($data)
    {
        return Db::table('slsh_goods')->where('slsh_goodid',$data['slsh_goodid'])->update($data);
    }
    //第三方修改信息
        public  function thirdxiugai($data)
    {
        return Db::table('slsh_items')->where('slsh_goodid',$data['slsh_goodid'])->update($data);
    }
    //显示第三方商品信息
    public function thirdshow2($data)
    {
        return Db::table('slsh_items')->where('slsh_goodid',$data)->find();
    }
      //显示第三方首页
     public function thirdshow($data)
    {
        return Db::table('slsh_items')->where('slsh_goodid',$data)->setField('slsh_show', '1');
    }
    //显示第三方详情页
     public function thirdshow1($data)
    {
        return Db::table('slsh_items')->where('slsh_goodid',$data)->setField('slsh_show', '0');
    }


    //插入第三方商品信息
    public function thirdaddgood($data)
    {
        return Db::table('slsh_items')->insert($data);
    }
    //查询第三方商品id
    public function thirdaddgoodSel($data)
    {
        return Db::table('slsh_items')->where('slsh_goodname',$data)->find();
    }
    //显示第三方上架商品分页
    public function thirdshowgood()
    {
     return  Db::name('items')->where('slsh_shelf','=',1)->paginate(10);
    }
    //显示第三方下架商品分页
    public function thirddowngood()
    {
     return  Db::name('items')->where('slsh_shelf','=',0)->paginate(10);
    }
    //第三方下架商品
    public function thirddown($data)
    {
        return Db::table('slsh_items')->where('slsh_goodid',$data)->setField('slsh_shelf', '0');
    }
    //第三方上架商品
     public function thirdup($data)
    {
        return Db::table('slsh_items')->where('slsh_goodid',$data)->setField('slsh_shelf', '1');
    }
    //第三方添加照片
    public function thirdaddphoto($data)
    {
        return Db::table('slsh_items')->where('slsh_goodid',$data['slsh_goodid'])->update($data);

    }
    //第三方显示折扣
    public function thirddiscountgood()
    {
        return  Db::name('items')->where('slsh_shelf','=',2)->paginate(10);
    }
    //第三方折扣
    public  function thirddiscountprice($data)
    {
        return Db::table('slsh_items')->where('slsh_goodid',$data['slsh_goodid'])->update($data);
    }
    //第三方还原价格
    public function thirdrestore($data)
    {
        return Db::table('slsh_items')->where('slsh_goodid',$data)->setField('slsh_shelf', '1');
    }
    //第三方删除
    public function thirddel($data)
    {
        return Db::table('slsh_items')->where('slsh_goodid',$data)->delete();
    }
    


}
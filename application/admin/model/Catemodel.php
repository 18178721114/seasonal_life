<?php
namespace app\admin\model;
use think\Model;
use think\Db;


class Catemodel extends Model
{   //查询大板块
	public function bigCateSle()
	{
       return   Db::name('plate')->where('slsh_bigid','=',0)->select();
	}
   //查询小版块
	public function smallCateSle()
	{
       return   Db::name('plate')->where('slsh_plateid','>',4)->select();
	}
	//添加版块
	public function addCate($data)
	{
       return Db::table('slsh_plate')->insert($data);
	}
	//版块分页
	public function page()
	{
       return  Db::name('plate')->where('slsh_plateid','>',4)->paginate(10);
	}
	//删除版块
	public function delCate($data)
	{
       return  Db::table('slsh_plate')->where('slsh_plateid',$data)->delete();
	}
	//物品关联查询
	public function goodcate($data)
    {
        return Db::table('slsh_plate')->where('slsh_plateid',$data)->find();
    }

}
<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\Session;

class Indexmodel extends Model
{
	//查找大板块
	public function selectbigplate()
	{
		return Db::name('plate')->where('slsh_bigid',0)->select(); 
	}
	//查找小版块
	public function selectsmallplate()
	{
		return Db::name('plate')->where('slsh_bigid','<>',0)->select();
	}

}
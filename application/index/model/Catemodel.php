<?php
namespace app\index\model;
use think\Model;
use think\Db;

class Catemodel extends Model
{
    //水果信息
    public function goodshow()
    {
        return  $plate =  Db::name('plate')->where('slsh_bigid',2)->select();
    }
    //坚果信息
   	public function giftshow()
    {
        return  $plate =  Db::name('plate')->where('slsh_bigid',4)->select();
    }
    //礼品信息
    public function nutshow()
    {
        return  $plate =  Db::name('plate')->where('slsh_bigid',3)->select();
    }
   
}
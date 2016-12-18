<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\wamp\www\slsh\public/../application/admin\view\index\index.html";i:1481680888;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
    <link rel="stylesheet" href="__STATIC__/admin/css/pintuer.css">
    <link rel="stylesheet" href="__STATIC__/admin/css/admin.css">
    <script src="__STATIC__/admin/js/jquery.js"></script>   
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="__STATIC__/admin/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="__SITE__" ><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp; &nbsp;&nbsp;<a class="button button-little bg-red" href="__SITE__/admin/index/logoout"><span class="icon-power-off"></span> 退出登录</a> </div>

</div>
<div class="leftnav">
  <div class="leftnav-title"><strong>菜单列表</strong></div>
  <h2>信息管理</h2>
  <ul style="display:block">
   <?php if($per == 1): ?>
    <li><a href="__SITE__/admin/index/info" target="right">网站信息</a></li>
    <?php else: ?>
    <li><a href="__SITE__/admin/info/info" target="right">网站信息</a></li>
    <li><a href="__SITE__/admin/info/buyer" target="right">买家管理</a></li>
    <li><a href="__SITE__/admin/info/seller" target="right">卖家管理</a></li>
     <?php endif; ?> 
  </ul>   
  <h2>板块管理</h2>
  <ul>
    <li><a href="__SITE__/admin/cate/cate" target="right">板块管理</a></li>        
  </ul>
  <h2>订单管理</h2>
  <ul>
    <li><a href="__SITE__/admin/order/notpay" target="right">未支付订单</a></li>
    <li><a href="__SITE__/admin/order/notsend" target="right">未发送订单</a></li>
    <li><a href="__SITE__/admin/order/send" target="right">已配送订单</a></li>
    <li><a href="__SITE__/admin/order/finish" target="right">已完成订单</a></li>        
  </ul> 
   <h2>商品管理</h2>
   <ul>
    <?php if($per == 1): ?>
    <li><a href="__SITE__/admin/good/thirdpergood" target="right">第三方上架商品</a></li>
    <li><a href="__SITE__/admin/good/thirddowngood" target="right">第三方下架商品</a></li>
    <li><a href="__SITE__/admin/good/thirddiscount" target="right">第三方折扣商品</a></li>
    <?php else: ?>
    <li><a href="__SITE__/admin/good/pergood" target="right">上架商品</a></li>
    <li><a href="__SITE__/admin/good/downgood" target="right">下架商品</a></li>
    <li><a href="__SITE__/admin/good/discount" target="right">折扣商品</a></li>
    <li><a href="__SITE__/admin/good/thirdpergood" target="right">第三方上架商品</a></li>
    <li><a href="__SITE__/admin/good/thirddowngood" target="right">第三方下架商品</a></li>
    <li><a href="__SITE__/admin/good/thirddiscount" target="right">第三方折扣商品</a></li>
     <?php endif; ?>   
  </ul>   
    
</div> 
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span></li>
</ul>
 <div class="admin">
  <iframe scrolling="auto" rameborder="0" src="info.html" name="right" width="100%" height="100%"></iframe>
</div> 

</body>
</html>
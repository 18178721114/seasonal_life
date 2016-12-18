<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\wamp\www\slsh\public/../application/index\view\my\mypassword.html";i:1481789566;}*/ ?>
<!DOCTYPE html>
<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="Rose">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width,user-scalable=0,initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-title" content="fruitday">
    <meta content="telephone=no" name="format-detection" />
    <meta content="email=no" name="format-detection" />
    <meta name="keywords" content="橙,苹果,火龙果,葡萄,瓜" />
    <meta name="description" content="天天果园官方网站提供水果生鲜、果篮券卡订制、干果零食等优质食品网购服务,2014年车厘子销量全网第一,佳沛奇异果、新奇士橙、进口牛油果等亦深受果友喜爱。" />
    <!-- tj -->
    <meta name="baidu-site-verification" content="iNWVGekdkk" />
    <meta name="360-site-verification" content="ebd66b0a60ba87c234630e8174396941" />
    <meta name="sogou_site_verification" content="K3NYdOvGD9"/>

    <title>食令生活-水果网购首选品牌，只为一份极致的新鲜！</title>
    <link rel="shortcut icon" href="http://www.fruitday.com/favicon.ico" >
    <link href="__STATIC__/Reception/Css/bootstrap.min.css" rel="stylesheet">
    <link href="__STATIC__/Reception/Css/common.css" rel="stylesheet" type="text/css">
    <link href="__STATIC__/Reception/Css/style.css" rel="stylesheet" type="text/css">
    <link href="__STATIC__/Reception/Css/index.css" rel="stylesheet" type="text/css">
    <link href="__STATIC__/Reception/Css/usercenter-basics.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="__STATIC__/Reception/Scripts/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="__STATIC__/Reception/Scripts/cart.js"></script>
    
</head>
<body>
    <!-- top -->
    <div class="top-con">
        
    </div>

    <!-- 头部开始 -->
    <section class="p-common-header">
        <div class="topnav">
            <div class="content clearfix">
                <ul class="pull-right list-inline">
                <li>
                        <a style="color:red;" href="/">生活首页</a>
                    </li>
                    <li>|</li>
                    <?php if(\think\Session::get('username') == null): ?>
                    <li>
                        <a href="__SITE__/index/user/login" class="link-gray">[ 登录 ]</a>
                        ，
                        <a href="__SITE__/index/user/register" class="link-gray">[ 注册有惊喜 ]</a>
                    </li>
                    <li>|</li>
                    <?php else: ?>
                    <li>您好，<?php echo \think\Session::get('username'); ?>
                        <a href="__SITE__/index/user/logout" class="link-gray">[ 退出 ]</a> &nbsp;
                        <a href="__SITE__/index/my/myorder" class="link-gray"> 我的生活 </a>
                    </li>
                    <li>|</li>
                    <?php endif; ?>
                    <li class="p-common-topsubnav">
                        生活公告
                        <!--<span class="tipscircle"></span>-->
                        <div class="p-common-noticelist hide">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="/notice/detail/816" target="_blank">全仓充值活动调整公告</a>
                                    <em>new</em>                            </li>
                                    <li>
                                        <a href="/notice/detail/815" target="_blank">全仓充值活动调整公告</a>
                                        <em>new</em>                            </li>
                                        <li>
                                            <a href="/notice/detail/813" target="_blank">充值赠品有效期规则公告</a>
                                            <em>new</em>                            </li>
                                        </ul>
                                        <div class="text-center"><a href="/notice" target="_blank">查看更多 ></a></div>
                                    </div>
                                </li>
                                <li>|</li>
                                <li>
                                    <a href="/web/card_change" class="link-gray pull-left" target="_blank">券卡兑换</a>
                                </li>
                                <li>|</li>
                                <li class="p-common-topsubnav">
                                    <img src="__STATIC__/Reception/Images/phone.jpg" />
                                    手机生活
                                    <div class="p-common-topcode hide">
                                        <div class="text-center">
                                            <span class="VI-color2">下载生活app，</span>
                                            即享特价生活商品
                                        </div>  
                                        <dl class="clearfix">
                                            <dt>
                                                <img src="__STATIC__/Reception/Picture/guan_ewcode2.jpg" alt="" />
                                            </dt>
                                            <dd>
                                                <a href="https://itunes.apple.com/us/app/tian-tian-guo-yuan-fruitday/id880977721" target="_blank">
                                                    <img src="__STATIC__/Reception/Picture/guan_btn01.jpg" alt="" />
                                                </a>
                                                <a href="http://cdn.fruitday.com/fruitday.apk" target="_blank">
                                                    <img src="__STATIC__/Reception/Picture/guan_btn02.jpg" alt="" />
                                                </a>
                                            </dd>
                                        </dl>
                                        <dl class="clearfix">
                                            <dt>
                                                <img src="__STATIC__/Reception/Picture/guan_ewcode1.jpg" alt="" />
                                            </dt>
                                            <dd>
                                                <span class="VI-color2">关注生活微信</span>
                                                优惠信息实时掌握
                                            </dd>
                                        </dl>
                                    </div>
                                </li>
                                <li>|</li>
                                <li>
                                    <img src="__STATIC__/Reception/Images/tel.jpg" /> <b>400-720-0770</b>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="content">
                        <nav class="navbar ">
                            <div class="container-fluid">
                             <div class="navbar-header">
                                <a href="__SITE__"><img src="__STATIC__/Reception/Picture/6.jpg" alt="" /></a>
                            </div>
                            <div class="collapse navbar-collapse" >
                                
                                <div class="navbar-right">
                                    <div class="p-common-topsearch">
                                        <input id="search-keyword" type="search" placeholder="请输入关键字" value="金奇异果"/>
                                        <input type="hidden" id="last_keyword" />
                                        <button id="search-button">
                                            <img src="__STATIC__/Reception/Images/fangda.jpg">
                                        </button>
                                        <div class="hotsearch">
                                            热门：
                                            <a href="/prolist/search?keyword=桃子" target="_blank">桃子</a>
                                            <a href="/prolist/search?keyword=苹果" target="_blank">苹果</a>
                                            <a href="/prolist/search?keyword=脐橙" target="_blank">脐橙</a>
                                            
                                        </div>
                                        <ul class="subsearch">
                                        </ul>
                                    </div>
                                    
                                    <div class="p-common-navtoggle" id="navtoggle">
                                        <i class="iconfont navtogglebg">&#xe601;</i>
                                        <ul class="navtoggle-icon list-unstyled">
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                    </div>

                            
                    <div class="p-common-minicart">
                    <a href="__SITE__/index/good/shopcar">
                     <div id="miniCart">
                      <img src="__STATIC__/Reception/Images/shopcar.jpg">

                      <span class="cartnum"><?php echo $count; ?></span>
                  </div></a>
                  <!-- <div class="cartcont"><i class="iconfont">&#xe607;</i>
                    <h5 class="text-center font-color">购物车中还没有商品，赶紧选购吧！</h5>
                </div> -->

            </div>
                            </div>



                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </section>
    <section class="p-component-usercenter clearfix">
        <div class="sidebar s_ani" >
            <span class="arrow"  id="arr"></span>
            <ul class="list-unstyled">
               <li>
                  <a href="__SITE__/index/my/myorder" >我的订单</a>		
                  
                  <a href="__SITE__/index/my/mymoney" >账户余额</a>		
                  <a href="__SITE__/index/my/mypay" >在线充值</a>		
                  <a href="__SITE__/index/my/myinfo" >基本资料</a>
                  <a href="__SITE__/index/my/mypassword" class="cur" >密码修改</a>
                  <a href="__SITE__/index/my/myaddress" >收货地址</a>
                  
              </li>
          </ul>
      </div>
      <div class="main">
          <h6 class="basic">密码修改</h6>  
          <div class="detail changeTel password-box">
            <div>
              <label class="pull-left">原密码:</label>
              <input type="password" class="pull-left" id="oldPass" name="password"  >
              <p style="padding-left:10px;padding-top:5px;"></p>
          </div>
          <div>
              <label class="pull-left">新密码:</label>
              <input type="password" class="pull-left " id="newPass" name="password" >
              <p style="padding-left:10px;padding-top:5px;"></p>
          </div>
          <div>
              <label class="pull-left newsec">确认密码:</label>
              <input type="password" class="pull-left " id="new2Pass" name="password" >
              <p style="padding-left:10px;padding-top:5px;"></p>
          </div>
          <a href="javascript:;" class="next-step pull-left btn btn-success" id="submit">确认提交</a>
          <p class="prompt pull-left overshow"></p>
      </div>
  </div>
</section>

<section class="toolbarfoot" id="tooft">
    <a href="/web/card_change" target="_blank" class="kq"></a>
    <a href="#" class="kf"><iframe id="kf" src="/kefu"  frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" width="35" height="35" style="outline: none;border: 0 none;position: fixed;bottom:39px;">
    </iframe></a>
    
    <a href="javascript:scrollTo(0,0);" class="return-top"></a>
</section>

<section class="p-common-footer">
    <div class="content">
        <ul class="list-inline clearfix">
            <li class="p-common-icon p1"></li
                ><li class="p-common-icon p2"></li
                ><li class="p-common-icon p3"></li
                ><li class="p-common-icon p4"></li>
            </ul>

            <div class="clearfix footbar">
                <div class="block4">
                    <div class=""><img src="__STATIC__/Reception/Picture/6.jpg" alt="" /></div>
                    <div class="tel"><img src="__STATIC__/Reception/Picture/guan_tel.png" alt="" /></div>
                    <div class="font-gray fs-4"><span class="font-color">服务时间</span> 09:00 - 21:00</div>
                </div>

                <ul class="block2 list-unstyled">
                    <li><img src="__STATIC__/Reception/Picture/guan_ewcode1.jpg" alt="" /><span>食令生活官方微信</span></li>
                    <li><img src="__STATIC__/Reception/Picture/guan_ewcode2.jpg" alt="" /><span>食令生活APP</span></li>
                </ul>
                <ul class="block3 list-unstyled">
                    <li><h4>购物指南</h4><a href="/help/index/725">新用户注册</a><a href="/help/index/726">在线下单</a><a href="/help/index/727">支付方式</a></li>
                    <li><h4>配送说明</h4><a href="/help/index/728">运费说明</a><a href="/help/index/729">运费方式</a><a href="/help/index/730">发票说明</a></li>
                    <li><h4>售后服务</h4><a href="/help/index/731">退换货规则</a><a href="/help/index/732">服务保障承诺</a><a href="/help/index/733">验货与签收</a></li>
                    <li><h4>企业服务</h4><a href="/help/index/734">企业订购</a><a href="/help/index/735">公司简介</a><a href="/help/index/736">定制专区</a></li>
                </ul>

            </div>
            <div class="copyright text-center">
                <p class="fs-2 font-color">版权所有 &copy; 2016食令生活&nbsp;&nbsp;保留所有权利 | 京ICP备12042163</p>
                <p class="fs-2 VI-color2">食令生活&nbsp;&nbsp;鲜果网购</p>
                <div> 
                    <a href="http://shwg.dianping.com/index.html" class="card-goverment"><img src="__STATIC__/Reception/Picture/guan_wgdjp.png" alt="" /></a>
                </div>
            </div>
        </div>
    </section>


    <!-- bi -->
    <iframe src="/utrace" style="width: 0;height: 0;"></iframe>
    <div class="back" style="width:100%;height:300%;background-color:#eee;opacity:0.5;position: absolute;margin-top:-1270px;display: none  ">
      
    </div>
    <div class="loading" style="width:300px;height:300px;position:absolute;z-index:999px;
    margin-top:350px;top:-150px;background:#ffffff;left:-150px;margin-left:700px;display:none;border:1px solid #eeeeee">
    <img src="" alt="" id="regcg" style="margin-left:120px;margin-top:20px; width:60px;height:60px">
    <div style="margin-left:110px;margin-top:20px; font-size:25px;" id ="cg"></div>
    <span id="sec" style="float:left;margin-left:100px;margin-top:80px;font-size:15px;"></span>
    <span style="float:left;margin-top:80px;font-size:15px ;"><a href="" id="reg">登录页面</a></span>
</div>
</body>
<div class="show-loading"></div>
<script src="__STATIC__/Reception/Scripts/require.js" data-main="http://www.fruitday.com/js/main"></script>

<script>
    $(function(){
        var $oldpass = $('#oldPass');
        var $newpass = $('#newPass');
        var $repass = $('#new2Pass');
        var $sub = $('#submit');

        
        $sub.click(function(){
            if($oldpass.val() != ''){
                if($newpass.val() !=''){
                    if($repass.val() !=''){ 
                     $.ajax({
                       type: "POST",
                       url: "updatepwd",
                       data: {'pwd':$newpass.val()},
                       success: function(msg){
                            //console.log(msg);
                            //var msg =JSON.parse(msg)
                            //alert(msg)
                            if(msg == 1){
                                function jump(count) {    
                                    window.setTimeout(function(){    
                                        count--;    
                                        if(count > 0) {
                                            $('#sec').html(count+' 后跳转');
                                            $('#reg').attr("href","__SITE__/index/user/login");
                                            $('#reg').innerHTML='登录页面';
                                            $('#regcg').attr("src","__STATIC__/Reception/Picture/smile.jpg");
                                            $("#cg").html('修改成功');
                                            $('.loading').css({"display":"block"});
                                            $('.back').css({"display":"block"}); 
                                            jump(count);    
                                        } else {    
                                            location.href= '__SITE__/index/user/login';
                                        }    
                                    }, 1000);    
                                }    
                                jump(3);
                            }else{
                                function jump1(count) {    
                                    window.setTimeout(function(){    
                                        count--;    
                                        if(count > 0) { 
                                           $('#sec').html(count+' 后跳转');
                                           $('#reg').attr("href","__SITE__/index/my/mypassword")
                                           $('#reg').html('修改密码');
                                           $('#regcg').attr("src","__STATIC__/Reception/Picture/cry.jpg")
                                           $("#cg").html('修改失败');
                                           $('.loading').css({"display":"block"}); 
                                           jump1(count);    
                                       } else {    
                                        location.href= '__SITE__/index/my/mypassword';
                                    }    
                                }, 1000);    
                                }    
                                jump1(3);
                                
                            }
                        }
                    });         
                 }else{
                    $repass.next().html('<font color="red">请输入密码</font>')
                }
            }else{
                $newpass.next().html('<font color="red">请输入密码</font>')
            }
        }else{
            $oldpass.next().html('<font color="red">请输入原始密码</font>')
        }     
    });
        
        function checkaPassword() {
            var reg = /\w{6,20}/;
            if (reg.test($repass.val())) {
                $repass.next().html('<font color="green">合法的密码</font>');
                if($newpass.val() == $repass.val()){
                    $repass.next().html('<font color="green">两次密码相同</font>');
                    return true;
                } else {
                    $repass.next().html('<font color="red">两次密码输入请保持相同</font>');
                    return false;
                }
            } else {
                $repass.next().html('<font color="red">密码必须是6~20位的字符</font>');
                return false;
            }
        }
        $repass.blur(function(){
            checkaPassword();
        })
        function checkPassword() {
            var reg = /\w{6,20}/;
            if (reg.test($newpass.val())) {
                $newpass.next().html('<font color="green">合法的密码</font>');
                return true;
            } else {
                $newpass.next().html('<font color="red">密码必须是6~20位的字符</font>');
                return false;
            }
        }
        $newpass.blur(function(){
            checkPassword();
        })
        function checkopass(){
           $.ajax({
               type: "POST",
               url: "dopwd",
               data: {'pwd':$oldpass.val()},
               success: function(msg){
                //console.log(msg);
                //var msg =JSON.parse(msg)
                //alert(msg)
                if(msg ==4){
                 $oldpass.next().html('<font color="green">原始密码正确</font>');
             }else{
               $oldpass.next().html('<font color="red">密码错误，请重新输入</font>');
               
           }
       }
   });
       }
       $oldpass.blur(function(){
        checkopass();
    })
       
   })
</script>

</html>
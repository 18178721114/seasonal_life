<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\wamp\www\slsh\public/../application/index\view\user\register.html";i:1481697901;}*/ ?>
<!DOCTYPE html>
<html xmlns:wb="http://open.weibo.com/wb" style="background-color: ;">
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
  <meta name="description" content="食令生活官方网站提供水果生鲜、果篮券卡订制、干果零食等优质食品网购服务,2014年车厘子销量全网第一,佳沛奇异果、新奇士橙、进口牛油果等亦深受果友喜爱。" />
  <!-- tj -->
  <meta name="baidu-site-verification" content="iNWVGekdkk" />
  <meta name="360-site-verification" content="ebd66b0a60ba87c234630e8174396941" />
  <meta name="sogou_site_verification" content="K3NYdOvGD9"/>

  <title>食令生活-水果网购首选品牌，只为一份极致的新鲜！</title>
  <link rel="shortcut icon" href="http://www.fruitday.com/favicon.ico" >
  <link href="__STATIC__/Reception/Css/bootstrap.min.css" rel="stylesheet">
  <link href="__STATIC__/Reception/Css/common.css" rel="stylesheet" type="text/css">
  <link href="__STATIC__/Reception/Css/style.css" rel="stylesheet" type="text/css">
  
  <script type="text/javascript" src="__STATIC__/Reception/Scripts/jquery-1.11.0.min.js"></script>
  <link href="__STATIC__/Reception/Css/register.css" rel="stylesheet" type="text/css">
  
  
</head>
<body style="background-color: ;">

  <div class="top-con">
    
  </div>

  <!-- 头部开始 -->
  <section class="p-common-header">
    <div class="topnav">
      <div class="content clearfix" style="margin-left:1150px;font-size:16px;">
        <a href="__SITE__">返回首页</a>
        
      </div>
    </div>
    <div class="content">
      <nav class="navbar ">
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="__SITE__"><img src="__STATIC__/Reception/Picture/6.jpg" alt="" /></a>
          </div>
          <div class="collapse navbar-collapse" >
          </div>
        </div>
      </nav>
    </div>
  </section>

  <!--<form action="__SITE__/index/user/doregister" method="post">-->
  <div class="w-1000 w-750 pt-50">
    <p class="member">注册会员</p>
    <div class="login-sec clearfix">
      <div class="login-left pull-left">
        <img src="__STATIC__/Reception/Picture/huiyuan.jpg">
        <div class="login">
          <a href="__SITE__/index/user/login" class="btn btn-primary btn-lg active login-btn" role="button" title="点击此按钮，登录会员账号"> 会员登录></a>
        </div>
      </div>       
      <div class="login-right pull-right">
        <div class="login-form">
          <ul>
            <li class="clearfix">
              <div class="text02 all pull-left">
                <span class="mobile">手机号</span>
              </div>
              <div class="send-yanzm pull-left">
                <input type="text" class="form-control" id="user" >
                <span></span>
              </div> 
            </li>

            <li class="clearfix">
              <div class="text04 all pull-left">
               <span class="code">密码</span>
             </div>
             <div class="password pull-left">
              <input type="password" placeholder="请输入6-20位号码字符" class="form-control" id="passwd" >
              <span></span>
            </div>
          </li>
          
          <li class="clearfix">
           <div class="text05 all pull-left">
             <span class="code">确认密码</span>
           </div>
           <div class="entrue pull-left">
             <input type="password" placeholder="请输入6-20位号码字符" class="pull-left form-control" id="Apasswd" >
             <span style="display:block"></span>
           </div>
         </li>

         <li class="clearfix">
          <div class="text01 all pull-left">
            <span class="form1">验证码</span>
          </div>
          <div class="yanzm pull-left">
            <input type="text text-01 " class="pull-left form-control" id="verify" name="verify">
            <span></span>
            <span class="yanzm-img"><img src="<?php echo captcha_src(); ?>" alt="captcha" class="auth-img" id="qw1"></span>
            <span class="update auth-img" id="asas"></span>
            <div id="q99"></div>
            <script>
              $(function(){
               document.getElementById('asas').onclick=function(){
                                           //alert(11)
                                           document.getElementById('qw1').src="<?php echo captcha_src(); ?>"
                                         }
                                       })
                                     </script>
                                   </div> 
                                 </li>

                                 <li class="clearfix">
                <!-- <div class="text03 all pull-left">
                 <span class="text">手机验证码</span>
                </div>
                <div class="mobile-yanzm pull-left">
                  <input type="text" class="form-control" disabled id="telverify"/><span class="true"></span>
                  <div class="send" id="TestGetCode"><span>发送验证码</span><span class="hide">还剩<b id="timeout">60</b>秒</span></div>

                </div> -->
              </li>

             <!--  <li >
                <div >
                  <div >
                      <input type="submit" value="注册">
                  </div>
                  <div >
                        <a href="__SITE__/index/user/login" >会员登录</a>
                  </div>
                </div>
              </li> -->
              <li class="clearfix">
                <div class="fruit-login pull-right">
                  <div class="fr-regist pull-left">
                   <a href="javascript:void(0)" class="btn-lg" role="button" id="submit">注册</a>
                 </div>
                 <div class="fr-login pull-left">
                  <a href="__SITE__/index/user/login" class="btn-lg" role="button">会员登录</a>
                </div>
              </div>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- </form> -->

  <input type="hidden" value=0 id="is_telverify">
  <input type="hidden" id="ref_url" value="http://www.fruitday.com/">

  <!--底部 -->
  <!--<section class="toolbarfoot">-->
  <!--<div class="toolbar-tab tab-card" style="bottom: 71px;">-->
  <!--<a href="/web/card_change" target="_blank">-->
  <!--<i class="tab-ico"></i>-->
  <!--<em class="tab-text">券卡</em>-->
  <!--</a>-->
  <!--</div>-->
  <!--<div class="toolbar-tab tab-top">-->
  <!--<a href="#" onclick="window.open('http://p.qiao.baidu.com/im/index?siteid=7860627&ucid=6965311','','width=800,height=600')">-->
  <!--<i class="tab-ico"></i>-->
  <!--<em class="tab-text">反馈</em>-->
  <!--</a>-->
  <!--</div>-->
  <!--<div class="toolbar-tab tab-feedback">-->
  <!--<a href="javascript:scrollTo(0,0);" >-->
  <!--<i class="tab-ico"></i>-->
  <!--<em class="tab-text">顶部</em>-->
  <!--</a>-->
  <!--</div>-->
  <!--</section>-->

  <section class="toolbarfoot" id="tooft">
    <a href="/web/card_change" target="_blank" class="kq"></a>
    <a href="#" class="kf"><iframe id="kf" src=""  frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" width="35" height="35" style="outline: none;border: 0 none;position: fixed;bottom:39px;">
    </iframe></a>
    <!--<a href="#" class="kf" onclick="window.open('http://p.qiao.baidu.com//im/index?siteid=7860483&ucid=6965311','','width=800,height=600')"></a>-->
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
          <p class="fs-2 font-color">版权所有 &copy; 2015食令生活&nbsp;&nbsp;保留所有权利 | 沪ICP备12042163</p>
          <p class="fs-2 VI-color2">食令生活&nbsp;&nbsp;鲜果网购</p>
          <div> <script language="JavaScript">
            document.writeln("<a href='https://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&entyId=dov73ne26zbqpug3tq1p70teyahin76ot0'><img src='__STATIC__/Reception/Picture/guan_shgs.gif' border=0></a>")
          </script>
          <a href="http://shwg.dianping.com/index.html" class="card-goverment"><img src="__STATIC__/Reception/Picture/guan_wgdjp.png" alt="" /></a>
        </div>
      </div>
    </div>
  </section>

  <iframe src="" style="width: 0;height: 0;"></iframe>

</body>
<div class="back" style="width:100%;height:300%;background-color:#eee;opacity:0.5;position: absolute;margin-top:-1270px;display: none  ">
  
</div>
<div class="loading" style="width:300px;height:300px;position:absolute;z-index:999px;
margin-top:350px;top:-150px;background:#ffffff;left:-150px;margin-left:700px;display:none;border:1px solid #eeeeee">
<img src="" alt="" id="regcg" style="margin-left:120px;margin-top:20px; width:60px;height:60px">
<div style="margin-left:110px;margin-top:20px; font-size:25px;" id ="cg">是哦后</div>
<span id="sec" style="float:left;margin-left:100px;margin-top:80px;font-size:15px;">计算机世</span>
<span style="float:left;margin-top:80px;font-size:15px ;"><a href="" id="reg">会员登陆</a></span>

</div>

<script>
  $(function(){
   var  $s=$('#submit')
   var  $u=$('#user')
   var  $p=$("#passwd")
   var  $ap=$('#Apasswd')
   var  $yan=$('yanzheng')
   var  $v=$('#qw1')
   var  $vv=$('#verify');
         //这是用户名验正
         function checkUsername() {
          var reg = /^1[34578]\d{9}$/;
          if (reg.test($u.val())) {
            $.ajax({
             type: "POST",
             url: "doregisterYanzhan",
             data: {'name':$u.val(),'pwd':$p.val(),'vfy':$vv.val(),'repwd':$ap.val()},
             success: function(msg){
              console.log(msg);
                        //var msg =JSON.parse(msg)
                        //alert(msg)
                        if(msg ==4){
                         $u.next().html('<font color="red">该手机号已注册,请输入正确手机号</font>');
                       }else{
                         $u.next().html('<font color="green">该用户可以使用</font>');
                         
                       }
                     }
                   });

          } else {
            $u.next().html('<font color="red">请输入合法手机号</font>');
          }
        }
        //这里是密码验证
        function checkPassword() {
          var reg = /\w{6,20}/;
          if (reg.test($p.val())) {
            $p.next().html('<font color="green">合法的密码</font>');
            return true;
          } else {
            $p.next().html('<font color="red">密码必须是6~20位的字符</font>');
            return false;
          }
        }
        //这里是重复密码验证
        function checkaPassword() {
          var reg = /\w{6,20}/;
          if (reg.test($ap.val())) {
            $ap.next().html('<font color="green">合法的密码</font>');
            if($p.val() == $ap.val()){
              $ap.next().html('<font color="green">两次密码相同</font>');
              return true;
            } else {
              $ap.next().html('<font color="red">两次密码输入请保持相同</font>');
              return false;
            }
          } else {
            $ap.next().html('<font color="red">密码必须是6~20位的字符</font>');
            return false;
          }
        }
       //这里是验证码验证
       function verify(){
        if($vv.val() == ''){
          $('#q99').html('<font color="red">验证码不能为空</font>')
        }else{
         $.ajax({
           type: "POST",
           url: "doregvfy",
           data: {'name':$u.val(),'pwd':$p.val(),'vfy':$vv.val(),'repwd':$ap.val()},
           success: function(msg){
             console.log(msg);    
             if(msg == 1){
               $('#q99').html('<font color="green">验证成功</font>');
               click();
             }else{
               $('#q99').html('<font color="red">'+msg+'</font>');
               document.getElementById('qw1').src="<?php echo captcha_src(); ?>"
             }
           }
         });
       }
     }
        //用户名移出焦点出发事件
        $u.blur(function() {
          checkUsername();
          
        });
         //密码移出焦点出发事件
         $p.blur(function() {
          checkPassword();
        });
         //密码移出焦点出发事件
         $ap.blur(function() {
          checkaPassword();
        });
        //验证码判断
        if($u.val() == ''){
        }else{
          $vv.focus(function(){
            if($vv.val()==''){
            }else{
              $.ajax({
               type: "POST",
               url: "doregvfy",
               data: {'name':$u.val(),'pwd':$p.val(),'vfy':$vv.val(),'repwd':$ap.val()},
               success: function(msg){
                $('#q99').html('<font color="red">'+msg+'</font>')
              }
            }); 
            }
          })
        }
        //验证码验证
        $vv.blur(function(){
         verify();
       })
        //点击注册    
        function  click(){
          $s.click(function(){
           if($u.val() != ''){
            if($p.val() !=''){
              if($ap.val() !=''){
                if($vv.val()!=''){
                        //console.log({'name':$u.val(),'pwd':$p.val(),'vfy':$vv.val(),'repwd':$ap.val()})
                        ajax()
                        function ajax(){
                         $.ajax({
                           type: "POST",
                           url: "doregister",
                           data: {'name':$u.val(),'pwd':$p.val(),'vfy':$vv.val(),'repwd':$ap.val()},
                           success: function(msg){
                       // console.log(msg)
                       if(msg == 1){
                        function jump(count) {    
                          window.setTimeout(function(){    
                            count--;    
                            if(count > 0) {
                             $('#sec').html(count+' 后跳转');
                             $('#reg').attr("href","__SITE__/index/user/login")
                             $('#reg').innerHTML='会员登录';
                             $('#regcg').attr("src","__STATIC__/Reception/Picture/smile.jpg")
                             $("#cg").html('注册成功');
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
                             $('#reg').attr("href","__SITE__/index/user/register")
                             $('#reg').html('会员登录');
                             $('#regcg').attr("src","__STATIC__/Reception/Picture/cry.jpg")
                             $("#cg").html('注册失败');
                             $('.loading').css({"display":"block"}); 
                             jump1(count);    
                           } else {    
                            location.href= '__SITE__/index/user/register';
                          }    
                        }, 1000);    
                        }    
                        jump1(3);
                        
                      }
                    }
                  });
                       }
                     }else{
                       $('#q99').html('<font color="red">请输入验证码</font>') 
                     }

                   }else{
                     $ap.next().html('<font color="red">请重复输入密码</font>')
                   }
                 }else{
                  $p.next().html('<font color="red">请输入密码</font>')
                }

              }else{
                $u.next().html('<font color="red">请输入手机号</font>')
              }     
            });
        }

      })

    </script>

    </html>


    
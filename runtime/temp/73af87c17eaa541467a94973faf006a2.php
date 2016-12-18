<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\wamp64\www\slsh\public/../application/admin\view\user\login.html";i:1481543997;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="renderer" content="webkit">
  <title>登录</title>  
  <link rel="stylesheet" href="__STATIC__/admin/css/pintuer.css">
  <link rel="stylesheet" href="__STATIC__/admin/css/admin.css">

  
  <script type="text/javascript" src="__STATIC__/admin/js/jquery-1.11.0.min.js"></script>

</head>
<body>
  <div class="bg"></div>
  <div class="container">
    <div class="line bouncein">
      <div class="xs6 xm4 xs3-move xm4-move">
        <div style="height:150px;"></div>
        <div class="media media-y margin-big-bottom">           
        </div>         

        <div class="panel loginbox">
          <div class="text-center margin-big padding-big-top"><h1>后台管理中心</h1></div>
          <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
            <div class="form-group">
              <div class="field field-icon-right">
                <input type="text" class="input input-big" id="user" name="name" placeholder="登录账号" data-validate="required:请填写账号" />

                <span id="user1"></span>
              </div>
            </div>
            <div class="form-group">
              <div class="field field-icon-right">
                <input type="password" class="input input-big" id="pwd" name="password" placeholder="登录密码" data-validate="required:请填写密码" />
                <span id="pwd1"></span>
              </div>
            </div>
            <div class="form-group">
              <div class="field">
                <input type="text" class="input input-big" id="yzm" name="code" placeholder="填写右侧的验证码" data-validate="required:请填写右侧的验证码" />
                <img src="<?php echo captcha_src(); ?>" alt="" width="100" height="32" class="passcode" style="height:43px;cursor:pointer;" onclick="this.src=this.src+'?'">                     
              </div>
              <span id="yzm1"></span>
            </div>
          </div>
          <div style="padding:30px;"><input type="submit" class="button button-block bg-main text-big input-big" id="submit" value="登录"></div>
        </div>

      </div>
    </div>
  </div>
  <div class="loading" style="width:300px;height:300px;position:absolute;z-index:999px;
  margin-top:350px;top:-150px;background:#ffffff;left:-150px;margin-left:640px;display:none;border:1px solid #eeeeee">
  <img src="__STATIC__/Reception/Picture/smile.jpg" alt="" id="regcg" style="margin-left:120px;margin-top:20px; width:60px;height:60px">
  <div style="margin-left:110px;margin-top:20px; font-size:25px;" id ="cg">登陆成功</div>
  <span id="sec" style="float:left;margin-left:100px;margin-top:80px;font-size:15px;">计算机世</span>
  <span style="float:left;margin-top:80px;font-size:15px ;"><a href="__SITE__/admin/index/index" id="reg">后台管理</a></span>
</div>
</body>

</html>
<script>
  window.onload = function () 

  {

	var $u = $('#user');//alert(typeof($u));
	var $sub = $('#submit');
	var $p = $('#pwd');
	var $yzm = $('#yzm');
   /*var $u = document.getElementById('#user');
    var $p = document.getElementById('#pwd');
    var $yzm = document.getElementById('#yzm');*/
    function checkUser(){

      var reg = /^1[34578]\d{9}$/;
      if(reg.test($u.val())){ 
        $.ajax({
          type: "POST",
          url: "doregisterUser",
          data: {'name':$u.val()},
          success: function(msg){
                    //console.log(msg)  //检测用   运行时不显示的
                     //alert(msg)
                     if(msg == 4){
                       $('#user1').html('<font color="green">该用户可以使用</font>');
                       
                     }else{
                      $('#user1').html('<font color="red">该手机号未注册，请先去注册</font><a href="__SITE__/index/user/register">立即去注册</a>');

                    }
                  }
                });
      }else {
        $('#user1').html('<font color="red">请输入正确的手机号</font>');
      }
    }
    //密码验证
    function checkPwd(){
      var reg = /\w{6,20}/;
      if (reg.test($p.val())) {
        $.ajax({
          type: "POST",
          url: "doregisterPwd",
          data: {'name':$u.val(),'pwd':$p.val()},
          success: function(msg){
                    //console.log(msg)  //检测用   运行时不显示的
                     //alert(msg);
                     if(msg == 3){
                       $('#pwd1').html('<font color="green">密码正确</font>');
                       
                     }else{
                      $('#pwd1').html('<font color="red">密码错误，请重新输入</font>');

                    }
                  }

                });
      }else{
        $('#pwd1').html('<font color="red">密码必须是6~20位的字符</font>');
      }
    }
    //验证验证码
    function checkYzm(){
      if($yzm.val() == ''){
        $('#yzm1').html('<font color="red">验证码不能为空</font>')
      }else{
       $.ajax({
         type: "POST",
         url: "doregisterYzm",
         data: {'yzm':$yzm.val()},
         success: function(msg){
                         //console.log(msg);    
                         if(msg == 1){
                           $('#yzm1').html('<font color="green">验证成功</font>');
                           
                         }else{
                           $('#yzm1').html('<font color="red">'+msg+'</font>');
                           /* document.getElementById('qw1').src="<?php echo captcha_src(); ?>"*/
                         }

                       }
                     });
     }

   }
   $yzm.blur(function(){
    checkYzm();
  })
   $p.blur(function(){
    checkPwd();
  })
   $u.blur(function(){
     checkUser();
   })
   function ajax(){
     $.ajax({
       type: "POST",
       url: "dologin",
       data: {'name':$u.val(),'pwd':$p.val()},
       success: function(msg){
           // console.log(msg)
           if(msg == 1){
            jump(3);
            function jump(count) {    
              window.setTimeout(function(){    
                count--;    
                if(count > 0) {
                 $('#sec').html(count+' 后跳转');
                 $('#reg').attr("href","__SITE__/index/index/index")
                 $('#reg').innerHTML='商城首页';
                 $('#regcg').attr("src","__STATIC__/Reception/Picture/smile.jpg")
                 $("#cg").html('登陆失败');
                 $('.loading').css({"display":"block"}); 
                 jump(count);    
               } else {    
                location.href= '__SITE__/index/index/index';
              }    
            }, 1000);    
            } 
          }else{
            function jump1(count) {    
              window.setTimeout(function(){    
                count--;    
                if(count > 0) {
                 $('#sec').html(count+' 后跳转');
                 $('#reg').attr("href","__SITE__/admin/index/index")
                 $('#reg').html('后台管理');


                 $('.loading').css({"display":"block"}); 
                 jump1(count);    
               } else {    
                location.href= '__SITE__/admin/index/index';
              }    
            }, 1000);    
            }    
            jump1(6);
          }
        }
      });
   }
   $sub.click(function(){
     if($u.val() ==''){
      $u.next().html('<font color="red">请输入手机号</font>');
      die();
    }else{
     if($p.val() ==''){
       $p.next().html('<font color="red">请输入密码</font>');
       die();
     }else{
      ajax()
    }
  }   
})

 }

</script>
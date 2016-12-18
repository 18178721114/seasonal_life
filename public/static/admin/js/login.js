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
                url: "doregister",
                data: {'name':$u.val()},
                success: function(msg){
                    //console.log(msg)  //检测用   运行时不显示的
                     //alert(msg)
                    if(msg == 4){
                       $('#user1').html('<font color="green">该用户可以使用</font>');
                       
                    }else{
                        $('#user1').html('<font color="red">该手机号未注册，请先去注册</font>');
                        
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
                        /* document.getElementById('qw1').src="{:captcha_src()}"*/
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
              jump(6);
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
                   $('#regcg').attr("src","__STATIC__/Reception/Picture/cry.jpg")
                   $("#cg").html('登录成功');
                   $('.loading').css({"display":"block"}); 
                   jump1(count);    
                 } else {    
                  location.href= '__SITE__/index/user/login';
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


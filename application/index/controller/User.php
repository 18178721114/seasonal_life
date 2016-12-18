<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use app\index\model\Usermodel;
use app\index\model\Goodmodel;
use think\Session;


class User extends Controller
{
  //邮箱验证
  public function con()
  {
    $subject="测试";

    $email="296694605@qq.com";
    // $email="718041217@qq.com";

    $con = '<style class="fox_global_style"> div.fox_html_content { line-height: 1.5;} /* 一些默认样式 */ blockquote { margin-Top: 0px; margin-Bottom: 0px; margin-Left: 0.5em } ol, ul { margin-Top: 0px; margin-Bottom: 0px; list-style-position: inside; } p { margin-Top: 0px; margin-Bottom: 0px } </style><table style="-webkit-font-smoothing: antialiased;font-family:"微软雅黑", "Helvetica Neue", sans-serif, SimHei;padding:35px 50px;margin: 25px auto; background:rgb(247,246, 242); border-radius:5px" border="0" cellspacing="0" cellpadding="0" width="640" align="center"> <tbody> <tr> <td style="color:#000;"> </td> </tr> <tr><td style="padding:0 20px"><hr style="border:none;border-top:1px solid #ccc;"></td></tr> <tr> <td style="padding: 20px 20px 20px 20px;"> Hi 你好 </td> </tr> <tr> <td valign="middle" style="line-height:24px;padding: 15px 20px;"> 感谢您注册phpbryant <br> 请点击以下链接修改您的密码： </td> </tr> <tr> <td style="height: 50px;color: white;" valign="middle"> <div style="padding:10px 20px;border-radius:5px;background: rgb(64, 69, 77);margin-left:20px;margin-right:20px"> <a style="word-break:break-all;line-height:23px;color:white;font-size:15px;text-decoration:none;" href="http://wwwphpbryant.com">http://wwwphpbryant.com</a> </div> </td> </tr> <tr> <td style="padding: 20px 20px 20px 20px"> 请勿回复此邮件，如果有疑问，请联系我们：<a style="color:#5083c0;text-decoration:none" href="http://www.slshengxian.cn/index/my/mypassword">http://www.slshengxian.cn/index/my/mypassword
    </a> </td> </tr><tr> <td style="padding: 20px 20px 20px 20px"> 交流群：000000 </td> </tr> <tr> <td style="padding: 20px 20px 20px 20px"> - phpbryant 团队-帮助你更快的完成项目- phpbryant.com </td> </tr> </tbody> </table>';
    $status = send($email,$subject,$con);

    if($status){
      echo 'success';
    }else{
      echo 'error';
    }

  }
  //退出
  public function logout()
  {
    session(null);
    $this->success('退出成功','index/index');
  }
  //初始化
  public  function __construct()
  {
    parent::__construct();
    $usermodel = new  Usermodel;
    $request = Request::instance();
  }
  //登录页面
  public function login()
  {
    return $this->fetch();
  }
  //登录判断
  public function dologin()
  {
    $goodmodel = new Goodmodel;
    $usermodel = new  Usermodel;
    $request = Request::instance();
    $data =$request->param();
    //dump($data);die();
    //echo json_encode($data);die();
    //

    $result = $usermodel->dologin($data['name']);
    //echo json_encode($result);die();
    if($result['slsh_tel'] == $data['name'] && $result['slsh_password'] == md5($data['pwd'])){

      if(!empty(session::get('goodname'))){
        for ($i=0; $i <count(session::get('goodname')) ; $i++) { 
          $dataa['slsh_shopgood'] =session::get('goodname')[$i]['goodname'];
          $dataa['slsh_goodid']=session::get('goodid')[$i]['goodid'];
          $dataa['slsh_pirce']=session::get('goodprice')[$i]['goodprice'];
          $dataa['slsh_spec']=session::get('goodspec')[$i]['goodspec'];

          $dataa['slsh_picture']=session::get('goodsrc')[$i]['goodsrc'];
          $dataa['slsh_num']=session::get('goodnum')[$i]['goodnum'];
          //$data['']
          $dataa['slsh_tel'] =$data['name'];
          $goodinfo  = $goodmodel->addgood($dataa);

        }


      }
      session(null);
      session::set('username',$data['name']);
      echo 1;
      die();
    }else{
      echo 2;
      die();
    }

  }


  //登录判断用户名
  public function dologinUser()
  {  
    $usermodel = new  Usermodel;
    $request = Request::instance();
    $data =$request->param();
    if(empty($data['name'])){
      echo '请输入手机号';
    }else{
      $result = $usermodel -> regselect( $data['name']);
      foreach ($result as $key => $v) {
        if($v['slsh_tel'] ==  $data['name']){
          echo 4;die();
          die();
        }else {
          echo 3;die();
        }
      }
    }    
  }
  //登录判断用户密码
  public function doregisterPwd()
  {
    $usermodel = new  Usermodel;
    $request = Request::instance();
    $data =$request->param();
    if(empty($data['pwd'])){
      echo '请输入密码';die();
    }else{
      $result = $usermodel -> selectPwd($data['name']);
      if ($result == md5($data['pwd'])) {
        echo 3;die();
      }
    }
  }



  //注册页面
  public function register()
  {
    return $this->fetch();
  }
  // 验证手机号是否注册过
  public function doregisterYanzhan()
  {  
    $usermodel = new  Usermodel;
    $request = Request::instance();
    $data =$request->param();
    if(empty($data['name'])){
      echo '请输入手机号';die();
    }else{
      $result = $usermodel -> regselect( $data['name']);
      foreach ($result as $key => $v) {
        if($v['slsh_tel'] ==  $data['name']){
          echo 4;die();
          die();
        }else {
          echo 3;die();
        }
      }
    }    
  }
  //验证码是否输入正确
  public function doregvfy(){
    if(!captcha_check($_POST['vfy'])){
      echo '验证失败';die();
    }else{
      echo 1;die();
    }
  }
  //注册
  public function doregister()
  {   
    $usermodel = new  Usermodel;
    $request = Request::instance();
    $data =$request->param();
    if(empty($data['pwd'])){
      echo '请输入密码';die();
    }else{
      if(empty($data['repwd'])){
        echo '请重新输入密码';die();
      }else{
        if(md5($data['pwd'])!=md5($data['repwd'])){
          echo '请输入相同的密码';die();
        }else{
          $date['slsh_username'] = $data['name'];
          $date['slsh_tel'] = $data['name'];
          $date['slsh_password'] = md5($data['pwd']);
          $ip =$_SERVER["REMOTE_ADDR"];
          if(!strcmp($ip,'::1')){
            $ip = '127.0.0.1';
          }else{
            $ip = ip2long($ip);
            $date['slsh_ip'] =  $ip ;
            $result = $usermodel->registeradd($date);
            if($result){
              echo 1;die();
            }else{
              echo '';die();
            }
          }
        }
      }
    }
  }
  //商品评论
  public function content()
  {
    //dump($_REQUEST); die;
    //dump(request()->file('image'));
    if (request()->file('image')) {
      //echo 999;
      $file = request()->file('image');
      // 移动到框架应用根目录/public/uploads/ 目录下
      $info = $file->move(ROOT_PATH. 'public' . DS . 'static/goodimg');
      if($info){
        $path1 = '/static/goodimg'; 
        $path6 =  $info->getSaveName();
        $path2 =$path1.'/'.str_replace('\\', '/', $path6);
        //dump($path2);
        $data['slsh_picture'] = $path2;
      }
    }
    if(empty($_REQUEST['content'])){
      $this->error('请输入评论内容');
    }
    $goodmodel =new Goodmodel;
    $usermodel =new Usermodel;
    //dump($_REQUEST['name']);
    $id = $goodmodel->iddi($_REQUEST['name']);
    //dump($id);die;
    $uid = $usermodel->idid(session::get('username'));
    $data['slsh_comment_uid'] = $uid['slsh_userid'];
    $data['slsh_comment_goodid']=$id['slsh_goodid'];
    $data['slsh_content'] = $_REQUEST['content'];
    $content = $goodmodel->content($data);
    if($content){
      $this->success('评论成功');
    }else{
      $this->error('评论失败');
    }
  }
}





















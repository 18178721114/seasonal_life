<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\wamp64\www\slsh\public/../application/admin\view\info\seller.html";i:1481691586;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>  
    <link rel="stylesheet" href="__STATIC__/admin/css/pintuer.css">
    <link rel="stylesheet" href="__STATIC__/admin/css/admin.css">
    <script src="__STATIC__/admin/js/jquery.js"></script>
    <script src="__STATIC__/admin/js/pintuer.js"></script>  
</head>
<body>
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 卖家管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>用户名</th>       
        <th>电话</th>
        
         <td>等级</td>
         <th width="120">注册时间</th>
        <th width="50"></th>
        <th width="50"></th>
        <th width="50"></th>
        <th></th>
        <th>操作</th>       
      </tr> 
      <?php if($people == null): ?>
      <tr>
        <font>哎哟，还没有吖~~ </font>
      </tr>
      <?php else: foreach($people as $key => $val): ?>     
        <tr>
          <td>
            <?php echo $val['slsh_userid']; ?></td>
          <td><?php echo $val['slsh_username']; ?></td>
          <td><?php echo $val['slsh_tel']; ?></td>
        
         <td><?php echo $val['slsh_level']; ?></td>
              
          <td><?php echo $val['slsh_regtime']; ?></td>
          <td><a href="__SITE__/admin/user/personal/slsh_userid/<?php echo $val['slsh_userid']; ?>"></a></td>
          <td><a href="__SITE__/admin/user/order"></a></td>
          <td><a href="__SITE__/admin/user/personal/slsh_userid/<?php echo $val['slsh_userid']; ?>">用户详情</a></td>
          <td><a href="__SITE__/admin/user/account"></a></td>
          <td><div class="button-group"> <a class="button border-red" href="__SITE__/admin/info/del/slsh_userid/<?php echo $val['slsh_userid']; ?>" onclick="return del(1)"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
        <?php endforeach; endif; ?>
      <tr>
        <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

function del(id){
  if(confirm("您确定要删除吗?")){
    
  }
}

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
    if (this.checked) {
      this.checked = false;
    }
    else {
      this.checked = true;
    }
  });
})

function DelSelect(){
  var Checkbox=false;
   $("input[name='id[]']").each(function(){
    if (this.checked==true) {   
    Checkbox=true;  
    }
  });
  if (Checkbox){
    var t=confirm("您确认要删除选中的内容吗？");
    if (t==false) return false;     
  }
  else{
    alert("请选择您要删除的内容!");
    return false;
  }
}

</script>
</body></html>
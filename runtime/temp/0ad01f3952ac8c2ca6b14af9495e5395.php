<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\wamp\www\slsh\public/../application/admin\view\user\account.html";i:1481795854;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>  
    <link rel="stylesheet" href="__STATIC__/admin/css/pintuer.css">
    <link rel="stylesheet" href="__STATIC__/admin/css/admin.css">
    <script src="__STATIC__/admin/js/jquery.js"></script>
    <script src="__STATIC__/admin/js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 账户详情</strong></div>
 
  <table class="table table-hover text-center">
    <tr style="height:40px;">
      <th width="25%">交易号</th>     
      <th>交易记录</th>  
      <th>余额</th>     
      <th width="250">时间</th>
    </tr>
   <?php foreach($moneyinfo as $info): ?>
    <tr style="height:50px;">
      <td><?php echo $info['slsh_mid']; ?></td>      
      <td>
        <?php if($info['slsh_toup'] == null): ?>
        -<?php echo $info['slsh_spending']; else: ?>
        +<?php echo $info['slsh_toup']; endif; ?>
      </td>  
      <td><?php echo $info['slsh_balance']; ?></td>      
      <td><?php echo $info['slsh_trading_time']; ?></div>
      </td>
    </tr> 
    <?php endforeach; ?>
     <tr>
        <td colspan="8"><div class="pagelist"> <?php echo $moneyinfo->render(); ?> </div></td>
      </tr>
    
  </table>
</div>


</body></html>
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\wamp\www\slsh\public/../application/admin\view\user\personal.html";i:1481792516;}*/ ?>
<!DOCTYPE html>
<!-- saved from url=(0028)http://www.daizhe.cn/profile -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="__STATIC__/admin/css/home.css">
		<link rel="stylesheet" type="text/css" href="__STATIC__/admin/css/person.css">
		<link rel="stylesheet" type="text/css" href="__STATIC__/admin/css/jquery.Jcrop.css">
		<title></title>
	</head>
	<body>
		<div class="jcropop_mask"></div>
		<div class="bgeb2">
			<section class="w1000 clear">
				<article class="fl pre_set setMp">
					<h3 class="setTitle">
						<i class="ico"></i> 个人资料	
					</h3>
					<div class="basic_data" id="form_box">
						<div class="data_tit">
						</div>
						<?php foreach($personal as $val): ?>
						<div class="data_info correctInfo">
							<dl >								
								<dd>
									<div class="headImg clear">
										<img src="<?php echo $val['slsh_picture']; ?>">
									</div>
								</dd>
							</dl>
							<dl>
								<dt>用户名：</dt>
								<dd>
									<span class="c">
										<div class="pre_setInp dataInp"><?php echo $val['slsh_username']; ?></div>
									</span>
								</dd>
							</dl>
							<dl>
								<dt>手机号：</dt>
								<dd>
									<span class="c">
										<div class="pre_setInp dataInp"><?php echo $val['slsh_tel']; ?></div>
									</span>
									
								</dd>
							</dl>
							<dl>
								<dt>生日：</dt>
								<dd>
									<span class="c">
										<div class="pre_setInp dataInp">
										<?php if($val['slsh_brithday'] == null): ?>
										该用户还未添加哟~~
										<?php else: ?>
										<?php echo $val['slsh_brithday']; endif; ?>
										</div>
									</span>
									
								</dd>
							</dl>
							
							<dl>
								<dt>性别：</dt>
								<dd>
									<span class="c">
										<div class="pre_setInp dataInp">
										<?php if($val['slsh_sex'] == 0): ?>
										男
										<?php elseif($val['slsh_sex'] == 1): ?>
										女
										<?php else: ?>
										保密
										<?php endif; ?>
										</div>
									</span>
									
								</dd>
							</dl>
							<dl>
								<dt>积分：</dt>
								<dd>
									<span class="c">
										<div class="pre_setInp dataInp"><?php echo $val['slsh_grade']; ?></div>
									</span>
									
								</dd>
							</dl>
							<dl>
								<dt>会员等级</dt>
								<dd>
									<span class="c">
										<div class="pre_setInp dataInp"><?php echo $val['slsh_level']; ?></div>
									</span>								
								</dd>
							</dl>
						</div>
						<?php endforeach; ?>
					</div>
				</article>				
			</section>
		</div>
	</body>
</html>
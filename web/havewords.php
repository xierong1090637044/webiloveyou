<?php
require_once('../weixin.class.php');
include_once '../phpcj/navbottom.php';
include_once '../phpcj/showtoast.php';
include_once '../phpcj/loading.php';
include_once '../phpcj/mask.php';
include_once '../phpcj/inputwithicon.php';
?>
<html lang="zh-cn">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<title>喂！我有话对你说</title>
		<link rel="stylesheet"  href="../css/havewords.css">
        <link rel="stylesheet"  href="../css/navbottom.css">
        <link rel="stylesheet"  href="../css/common.css">
		<link rel="stylesheet"  href="../css/iconfont.css">
        <link rel="stylesheet"  href="../cjcss/toast.css">
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../srcjs/bmob.js"></script>
        <script type="text/javascript" src="../js/havewords.js"></script>
        <script src="../js/iconfont.js"></script>
	</head>
	<body>
		<div class="mobilecontent">
            <!--<div class="shangchuantp"><a href="corp.php">对你表白</a></div>-->
			<div class="setting-item" id ='setting-item'>
			  <a href="corp.php">
			    <div class="setting-border" id='setting1' style="display:none">
				    <svg class='setting' aria-hidden='true'><use xlink:href='#icon-xiangji1'></use></svg>
			    </div>
			  </a>
			  <div class="setting-border" id='setting2' style="display:none">
				  <svg class='setting' aria-hidden='true'><use xlink:href='#icon-sousuo1'></use></svg>
			  </div>
			  <div class="setting-border" id='setting'>
				  <svg class='setting' aria-hidden='true'><use xlink:href='#icon-shezhi'></use></svg>
			  </div>
		    </div>

			<div class="bbqdetails">
			</div>
		</div>

		<?php  $toast =new showToast("toast","不能不填哦！");$toast->showtoast() ?>
		<?php  $toast =new showToast("toast1","创建成功！");$toast->showtoast() ?>
		<?php  $toast =new showToast("toast2","内容不能少于15个字！");$toast->showtoast() ?>
		<?php  $toast =new showToast("toast3","搜索内容不能为空！");$toast->showtoast() ?>
		<?php  $toast =new showToast("toast4","查询成功！");$toast->showtoast() ?>
		<?php  $toast =new showToast("toast5","暂时没有该表白墙！");$toast->showtoast() ?>
		<?php  $loading =new Loading;$loading->loading() ?>
		<?php  $mask =new Mask;$mask->mask() ?>
		<?php  $input =new Inputwithicon("inputposition");$input->input() ?>
		<?php  $bottom =new Bottomnav("4");$bottom->Bottom() ?>
		<script type="text/javascript"></script>
	</body>
</html>

<?php
include_once '../phpcj/showtoast.php';
include_once '../phpcj/create_edit.php';
include_once '../lib/BmobUser.class.php';
include_once '../lib/BmobBql.class.php';
include_once '../phpcj/loading.php';

?>

<html lang="zh-cn">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
		<title>三行情书</title>
		<link rel="stylesheet"  href="../css/webcss/sanhangqs.css">
		<link rel="stylesheet"  href="../css/iconfont.css">
		<link rel="stylesheet"  href="../cjcss/create.css">
		<link rel="stylesheet"  href="../cjcss/toast.css">
		<link rel="stylesheet"  href="../css/common.css">
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../cjjs/create.js"></script>
		<script type="text/javascript" src="../srcjs/bmob.js"></script>
		<script type="text/javascript" src="../js/webjs/sanhangqs.js"></script>
        <script src="../js/iconfont.js"></script>
		<script src="../js/common.js"></script>
	</head>
	<body>
		<div class="mobilecontent">
			<div class="headeropera">
				<div class="create" id="create"><span style="font-size:13px;">创建</span></div>
				<div class="orderby" id='orderby'><span style="font-size:13px;">排序</span></div>
			</div>
			<div class="qingshu">
				<div class="content"></div>
				<div class="getmore" id='getmore'>
					<img src="../images/getmore.png" style="width:45%"/>
				</div>
			</div>

			<div class="triangle_border_up"></div>
			<div class="orderby-item">
				<div class="orderby-time" id="time">时间</div>
				<div class="orderby-time" id="redu">热度</div>
			</div>
		</div>
		<div id='stars'></div>
		<div id='stars2'></div>
		<div id='stars3'></div>
		<?php  $toast =new showToast("toast","不能不填哦！");$toast->showtoast() ?>
		<?php  $toast =new showToast("toast1","创建成功！");$toast->showtoast() ?>
		<?php  $toast =new showToast("toast2","内容不能少于15个字！");$toast->showtoast() ?>
		<?php  $bottom =new create();$bottom->Create() ?>
		<?php  $mask =new Loading;$mask->loading() ?>
		<script type="text/javascript"></script>
	</body>
</html>

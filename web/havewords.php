<?php
require_once('../weixin.class.php');
include_once '../phpcj/navbottom.php';
include_once '../phpcj/showtoast.php';
include_once '../phpcj/create_edit.php';
include_once '../lib/BmobUser.class.php';
include_once '../lib/BmobBql.class.php';
?>
<html lang="zh-cn">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<title>去哪找你</title>
		<link rel="stylesheet"  href="../css/whereisyou.css">
        <link rel="stylesheet"  href="../css/navbottom.css">
        <link rel="stylesheet"  href="../css/common.css">
		<link rel="stylesheet"  href="../css/iconfont.css">
        <link rel="stylesheet"  href="../cjcss/toast.css">
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../srcjs/bmob.js"></script>
        <script type="text/javascript" src="../js/whereisyou.js"></script>
        <script src="../js/iconfont.js"></script>
	</head>
	<body>
		<div class="mobilecontent">
            <a href="corp.php">dsad</a>
		</div>

		<?php  $toast =new showToast("toast","不能不填哦！");$toast->showtoast() ?>
		<?php  $toast =new showToast("toast1","创建成功！");$toast->showtoast() ?>
		<?php  $toast =new showToast("toast2","内容不能少于15个字！");$toast->showtoast() ?>
		<?php  $bottom =new Bottomnav("4");$bottom->Bottom() ?>
		<script type="text/javascript"></script>
	</body>
</html>

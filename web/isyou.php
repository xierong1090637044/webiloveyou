<?php
require('../phpcj/mask.php');
require('../phpcj/button.php');
include_once '../phpcj/navbottom.php';
?>

<html lang="zh-cn" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<title>缘来是你</title>
        <link rel="stylesheet" type="text/css" href="../css/isyou.css" />
        <link rel="stylesheet"  href="../css/navbottom.css">
		<link rel="stylesheet"  href="../css/common.css">
		<script type="text/javascript" src="../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../srcjs/bmob.js"></script>
        <script src="../js/iconfont.js"></script>
        <script src="../js/isyou.js"></script>
	</head>
    <body>
        <div class="mobilecontent">
			<div class="headeropera">
				<div class="create" id="create"><span style="font-size:13px">上传照片</span></div>
				<div class="orderby"><span style="font-size:13px">换一批</span></div>
			</div>
		</div>
        <div id ='iycontent' class="iycontent">
            <div class="iycontent1">
                <div class="iytext" style="font-size:12px">这里的每一张图片</div>
                <div class="iytext1">都有可能代表着一个感人的故事</div>
            </div>
			<div class="iybacgroundimg"><img src='http://bmob-cdn-18174.b0.upaiyun.com/2018/06/21/a325066c4061721e80244cb3ef2241b9.jpg' class="iyimage1"></img></div>
			<div class="iybacgroundtext">
				<div class="iytextcontent">我的意中人是个盖世英雄</div>
				<div class="iytextcontent">有一天他会踩着七色云彩来娶我</div>
				<div class="iytextcontent">我猜中了前头可我猜不着这结局</div>
				<div class="iytextcontent" style="text-align:right">————致意中人</div>
			</div>
			<?php  $button =new Button("confrim","确定" ,"buttonposition");$button->button() ?>
        </div>
        <?php  $mask =new Mask;$mask->mask() ?>
        <?php  $bottom =new Bottomnav("3");$bottom->Bottom() ?>
        <script type="text/javascript"></script>
	</body>
</html>

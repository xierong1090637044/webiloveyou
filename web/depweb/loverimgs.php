<?php
include_once '../../phpcj/mask.php';
?>

<html lang="zh-cn">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<title>情侣头像</title>
        <link rel="stylesheet"  href="../../css/common.css">
		<link rel="stylesheet"  href="../../css/webcss/qinglvtx.css">
		<link rel="stylesheet"  href="../../css/iconfont.css">
		<script type="text/javascript" src="../../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../../srcjs/bmob.js"></script>
		<script type="text/javascript" src="../../js/webjs/qinglvtx.js"></script>
        <script src="../../js/iconfont.js"></script>
	</head>
	<body ontouchstart="">

        <div class="MobMain">

			<div class="content" id="content">
				<div class="secondcontent1 hidden">
					<div style="color:#fff;text-align:center;margin-top:15px">久违的恩爱，甜蜜清新风的情侣头像.</div>
					<div style="color:#fff;text-align:center;font-size:12px;margin:10px 0px 10px 0px">长按我可以保存到本地哦（而且我是可以滑动的哦）</div>
				</div>
				<div class="secondcontent2 hidden">
					<div style="color:#fff;text-align:center;margin-top:15px">你侬我侬的情侣男女生专属微信头像图片。</div>
					<div style="color:#fff;text-align:center;font-size:12px;margin:10px 0px 10px 0px">长按我可以保存到本地哦（而且我是可以滑动的哦）</div>
				</div>
				<div class="secondcontent3 hidden">
					<div style="color:#fff;text-align:center;margin-top:15px">我和你，左右右左，拼凑一起，才是完整。分享这样一组情侣头像，感谢喜欢。</div>
					<div style="color:#fff;text-align:center;font-size:12px;margin:10px 0px 10px 0px">长按我可以保存到本地哦（而且我是可以滑动的哦）</div>
				</div>
				<div class="secondcontent4 hidden">
					<div style="color:#fff;text-align:center;margin-top:15px">晚点遇见你没关系，但愿余生都是你。</div>
					<div style="color:#ddd;text-align:center;font-size:12px;margin:10px 0px 10px 0px">长按我可以保存到本地哦（而且我是可以滑动的哦）</div>
				</div>
			</div>
        </div>
		<?php  $mask =new Mask;$mask->mask() ?>
	    <script></script>
	</body>
</html>

<?php
?>

<html lang="zh-cn">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<title>制作表白网页</title>
        <link rel="stylesheet"  href="../../css/webcss/loverstory.css">
        <link rel="stylesheet"  href="../../css/common1.css">
		<link rel="stylesheet"  href="../../css/iconfont1.css">
		<script type="text/javascript" src="../../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../../srcjs/bmob.js"></script>
		<!--<link rel="stylesheet"  href="../cjcss/danmu.css">-->
		<!--<script type="text/javascript" src="../cjjs/danmu.js"></script>-->
        <script src="../../js/iconfont.js"></script>
	</head>
	<body ontouchstart="">
        <div class="MobMain">
            <div class="item">
                <img src="../../images/loverstory/1.png" class="itemimg"></img>
                <div class="itemtext" id="itemtext">立即制作</div>
            </div>
        </div>

	    <script>
        var userid = localStorage["objectid"];
        console.log(userid);

        $('#itemtext').click(function(){
            window.location.href="../../funny/love_heart/index.html?objectid="+userid;
        })
        </script>
	</body>
</html>

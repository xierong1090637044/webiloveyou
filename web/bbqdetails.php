<?php
include_once '../phpcj/loading.php';
include_once '../phpcj/showtoast.php';
?>

<html lang="zh-cn">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<title>表白墙详情</title>
        <link rel="stylesheet"  href="../css/navbottom.css">
		<link rel="stylesheet"  href="../css/iconfont.css">
        <link rel="stylesheet"  href="../css/common.css">
        <link rel="stylesheet"  href="../cjcss/toast.css">
        <link rel="stylesheet"  href="../css/bbqdetails.css">
		<script type="text/javascript" src="../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../srcjs/bmob.js"></script>
        <script type="text/javascript" src="../js/bbqdetails.js"></script>
        <script src="../js/iconfont.js"></script>
	</head>
	<body ontouchstart="">
        <div class="MobContent">
            <div class="header-item">
                 <div class="header-img">
                     <div id='tellobject' class="tellobject"></div>
                     <img class="loveimg" src='../images/love.png' />
                     <img id='addcomment' class="addcomment" src='../images/addcomment.png' />
                     <img id='bgimg' class="bgimg"></img>
                     <div class="master">
                         <div class="masterinfo">
                             <div class="create" style="float:left">创建者：</div>
                             <div class="mastername" id='mastername'></div>
                         </div>
                         <img class="masteravatar"></img>
                         <div class="creater-at"></div>
                     </div>
                 </div>
            </div>

            <div class="comment">
            </div>

            <div class ="mask" id="mask"></div>
            <div id="edit" class="maincontent">
               <img src="../images/iwantsay.png" class="sanhangqstitle" />
               <div class="form">
                 <div style="margin-top:5px;margin-bottom:13px;"><textarea placeholder="内容" maxlength="80" class="textarea" id="cjcontent" wrap="hard"></textarea></div>
                 <div style="margin-bottom:10px;"><input type="submit" value="提交" class="submit" id="submit"></div>
               </div>
            </div>
        </div>
        <?php  $loading =new Loading;$loading->loading() ?>
        <?php  $toast =new showToast("toast","内容不能少于15个字哦！","toastposition");$toast->showtoast() ?>
        <?php  $toast =new showToast("toast1","评论发表成功！","toastposition");$toast->showtoast() ?>
        <script type="text/javascript"></script>
	</body>
</html>

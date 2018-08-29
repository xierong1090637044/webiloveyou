<?php
require_once('../weixin.class.php');
include_once '../lib/BmobUser.class.php';
include_once '../lib/BmobBql.class.php';
$weixin = new class_weixin();
$bmobUser = new BmobUser();

$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
//$username = "啦啦啦、岁月无恙";
//$password = "oaFlg1uTBXz2U_J2njjOaUQY3_F0";
if($username ==null || $password ==null)
{
    if (!isset($_GET["code"])){
		$redirect_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$jumpurl = $weixin->oauth2_authorize($redirect_url, "snsapi_userinfo", "123");
		Header("Location: $jumpurl");
	}else{
        $access_token_oauth2 = $weixin->oauth2_access_token($_GET["code"]);
		$userinfo = $weixin->oauth2_get_user_info($access_token_oauth2['access_token'], $access_token_oauth2['openid']);
		$name = $userinfo["nickname"];
		$password = $userinfo["openid"];
        $city = $userinfo["city"];
        $province = $userinfo["province"];

        $expire=time()+60*60*24*30;
        setcookie("username", $name, $expire);
        setcookie("password", $password, $expire);

        try {
            $res = $bmobUser->register(array("username"=>$userinfo["nickname"], "password"=>$userinfo["openid"],"openid"=>$userinfo["openid"],"avatar"=>str_replace("/0","/46",$userinfo["headimgurl"]),"sex"=>$userinfo["sex"],"city"=>$province.$city));
            $expire=time()+60*60*24*30;
            setcookie("objectId",$res->objectId, $expire);
        } catch (Exception $e) {
            $res1 = $bmobUser->login($name,$password);
            $expire=time()+60*60*24*30;
            setcookie("objectId",$res1->objectId, $expire);
            $info=json_encode($res1);
            $info=json_decode($info,true);
        }
    }
}else {
    $res1 = $bmobUser->login($username,$password);
    $expire=time()+60*60*24*30;
    setcookie("objectId",$res1->objectId, $expire);
    $info=json_encode($res1);
    $info=json_decode($info,true);
}
?>

<html lang="zh-cn">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<title>校园服务</title>
		<link rel="stylesheet"  href="../css/iconfont.css">
		<link rel="stylesheet"  href="../css/bootstrap.min.css">
		<link rel="stylesheet"  href="../cjcss/danmu.css">
		<script type="text/javascript" src="../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../srcjs/bmob.js"></script>
		<script src="../js/bootstrap.js"></script>
        <script src="../js/iconfont.js"></script>
		<script type="text/javascript" src="../cjjs/danmu.js"></script>
	    <style>
        body
        {
            background-color: #fafafa;
        }
		a:hover
		{
			background: #2ca879;
			color: #fff !important;
			text-decoration:none!important;
		}
		.homeimage
		{
			width: 100%;
		}
		.liststyle
		{
			width: 100%;
			background: #fff;
			padding: 10px 0;
			float: left;
		}
		.iconfont
		{
           font-size: 25px;
		   color: #fff;
	   }
	   .iconfont1
	   {
		  font-size: 35px !important;
	  }
	   .listitem
	   {
		   width: calc(25% - 10px);
		   padding: 5px;
		   border: 1px solid#dddd;
		   border-radius: 4px;
		   text-align: center;
		   display: inline-block;
		   float: left;
		   margin: 5px;
		   color: #000;
	   }
	   .iconstyle
	   {
		   background: #6ecad5;
		   border-radius: 50%;
		   height: 60px;
		   width: 60px;
		   text-align: center;
		   line-height: 60px;
		   margin: 0 auto;
	   }
	   .listtext
	   {
		   width: 100%;
		   font-size: 13px;
		   margin: 2px 0 0 0;
	   }
	   .color1
	   {
		   background: #d56eb9!important
	   }
	   .color2
	   {
		   background: #6e8bd5!important;
	   }
	   .color3
	   {
		   background: #6ed590!important;
	   }
	   .color4
	   {
		   background: #d04754!important;
	   }
	   .color5
	   {
		   background: #515151!important;
	   }
	   .inputdanmu
	   {
		   position: fixed;
		   bottom: 0%;
		   left: 0%;
		   width: 100%;
		   padding: 5px;
	   }
	   .textlook
	   {
		   float: left;
		   font-size: 12px;
		   color: #000;
		   font-style: italic;
		   font-weight: 400;
		   margin: 5px;
		   width: calc(100% - 10px);
		   border-bottom:1px solid #ddd;
		   line-height: 30px;
	   }
	   .iconfont2
	   {
		   color: #2ca879;
		   font-size: 17px;
	   }
	    </style>
	</head>
	<body ontouchstart="">
		<div class="mobilecontent">
		  <div class="homeimage">
			  <img src="../images/school/schoolhome.png" style="width:100%;height:10rem"/>
		  </div>
		  <div class="liststyle">
			  <a class="listitem" href="express.php">
				  <div class="iconstyle"><i class="iconfont icon-kuaidi11"></i> </div>
				  <div class="listtext">快递</div>
			  </a>
			  <div class="listitem">
				  <div class="iconstyle color1"><i class="iconfont iconfont1 icon-zufangiconx-"></i> </div>
				  <div class="listtext">租房</div>
			  </div>
			  <div class="listitem">
				  <div class="iconstyle color2"><i class="iconfont icon-qiuzhizhe"></i> </div>
				  <div class="listtext">兼职</div>
			  </div>
			  <div class="listitem">
				  <div class="iconstyle color3"><i class="iconfont iconfont1 icon-mengxiang2"></i> </div>
				  <div class="listtext">活动</div>
			  </div>
			  <a href="index.php" class="listitem">
				  <div class="iconstyle color4"><i class="iconfont iconfont1 icon-lianai"></i> </div>
				  <div class="listtext">恋爱</div>
			  </a>
			  <div class="listitem">
				  <div class="iconstyle color5"><i class="iconfont iconfont1 icon-personal-center"></i> </div>
				  <div class="listtext">个人中心</div>
			  </div>
		  </div>

		  <div class="textlook">
			  <i class="iconfont icon-youqingtishi iconfont2"></i>
			  <text style="color:#5c5c5c">看看他们怎么说</text>
		  </div>

		 <div class="inputdanmu">
			 <button id="stop" class="btn btn-primary">停止</button>
   		     <button id="open" class="btn btn-primary">弹</button>
			 <input type="text" class="form-control" name="" id="barrage_content" placeholder="发送弹幕,最多15个字" maxlength=15 style="float:right">
			 <button class="btn btn-primary" id="submit_barraget" style="float:right;margin-right:10px">发送</button>
		 </div>
	  </div>
      <script type="text/javascript">
      Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");
      </script>
      <script type="text/javascript" src="../cjjs/creatdanmu.js"></script>
	</body>
</html>

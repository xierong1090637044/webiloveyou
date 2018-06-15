<?php
require_once('weixin.class.php');
include_once 'lib/BmobUser.class.php';
include_once 'lib/BmobBql.class.php';

$weixin = new class_weixin();
$bmobUser = new BmobUser();
$text = 'true';
if($text =='true')
   {
	   $name = "啦啦啦、岁月无恙";
	   $password = "oaFlg1uTBXz2U_J2njjOaUQY3_F0";
	   $res = $bmobUser->login($name,$password);
       $info=json_encode($res);
       $info=json_decode($info,true);
   }
else {
	if (!isset($_GET["code"])){
		$redirect_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$jumpurl = $weixin->oauth2_authorize($redirect_url, "snsapi_userinfo", "123");
		Header("Location: $jumpurl");
	}else{
		$access_token_oauth2 = $weixin->oauth2_access_token($_GET["code"]);
		$userinfo = $weixin->oauth2_get_user_info($access_token_oauth2['access_token'], $access_token_oauth2['openid']);
		$name = $userinfo["nickname"];
		$password = $userinfo["openid"];
		try {
			$res = $bmobUser->login($name,$password);
            $info=json_encode($res);
            $info=json_decode($info,true);
		} catch (Exception $e) {
			$res = $bmobUser->register(array("username"=>$userinfo["nickname"], "password"=>$userinfo["openid"],"openid"=>$userinfo["openid"],"avatar"=>str_replace("/0","/46",$userinfo["headimgurl"]),"sex"=>$userinfo["sex"]));
            $info=json_encode($res);
            $info=json_decode($info,true);
		}
		// var_dump($access_token_oauth2);
		// $userinfo = $weixin->get_user_info($access_token_oauth2['openid']); //此方法能获取更详细的数据
		// var_dump($userinfo);
}
}

?>

<html lang="zh-cn">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<title>网页授权Demo</title>
		<link rel="stylesheet"  href="css/reset.css">
		<link rel="stylesheet"  href="css/style.css">
		<link rel="stylesheet"  href="css/iconfont.css">
		<script type="text/javascript" src="srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="srcjs/bmob.js"></script>
	</head>
	<body ontouchstart="">
		<div id="main" class="main">
            <div class="overplay">
                <img src="<?php echo $info["avatar"];?>" class="avatar">
                <div class="nickname"><?php echo $info["username"];?></div>
            </div>
	    </div>

	      <div id = "nav" class="nav">
	          <ul class="ul">
                  <li><img src="<?php echo $info["avatar"];?>" class="avatarli"></li>
                  <li class="nicknameli"><?php echo $info["username"];?></li>
	              <li class="daohang">导航</li>
	              <li class="daohang1">导航</li>
	              <li class="daohang1">导航</li>
	          </ul>
	      </div>

	      <div id='shownav' class="shownav">
	          <i class="iconfont icon-unorderedlist" style="font-size:20px"></i>
	      </div>

	    <script type="text/javascript">
	  	//Bmob.initialize("Application ID", "REST API Key");
	      Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");

	      $(document).ready(function()
	      {
	          var height = $(window).height();
	          $(document.body).css('height',height);
	      })

	      var navindex = true;
	      $('#shownav').click(function(){
	          if (navindex) {
	              navindex = false;
	              $('#nav').animate({marginLeft:'0%'},1000,'swing')
	          }
	          else {
	              navindex = true;
	              $('#nav').animate({marginLeft:'-36%'},1000,'swing')
	          }
	      });

	    </script>
	</body>
</html>

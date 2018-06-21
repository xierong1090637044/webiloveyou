<?php
header("Content-type:text/html;charset=utf-8");
require_once('../weixin.class.php');
include_once '../phpcj/navbottom.php';
include_once '../lib/BmobUser.class.php';
include_once '../lib/BmobBql.class.php';

$weixin = new class_weixin();
$bmobUser = new BmobUser();

//$expire=time()+60*60*24*30;
//setcookie("username", "啦啦啦、岁月无恙", $expire);
//setcookie("password", "oaFlg1uTBXz2U_J2njjOaUQY3_F0", $expire);
$username = $_COOKIE["username"];
$password = $_COOKIE["password"];
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

        $expire=time()+60*60*24*30;
        setcookie("username", $name, $expire);
        setcookie("password", $password, $expire);

        try {
            $res = $bmobUser->register(array("username"=>$userinfo["nickname"], "password"=>$userinfo["openid"],"openid"=>$userinfo["openid"],"avatar"=>str_replace("/0","/46",$userinfo["headimgurl"]),"sex"=>$userinfo["sex"]));
        } catch (\Exception $e) {
            $res1 = $bmobUser->login($name,$password);
            $info=json_encode($res1);
            $info=json_decode($info,true);
        }
    }
}else {
    $res1 = $bmobUser->login($username,$password);
    $info=json_encode($res1);
    $info=json_decode($info,true);
}

/*$text = 'true';
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
		$info = $weixin->oauth2_get_user_info($access_token_oauth2['access_token'], $access_token_oauth2['openid']);
		$name = $info["nickname"];
		$password = $info["openid"];
		try {
			$res = $bmobUser->login($name,$password);
            $info=json_encode($res);
            $info=json_decode($info,true);
		} catch (Exception $e) {
			$res = $bmobUser->register(array("username"=>$info["nickname"], "password"=>$info["openid"],"openid"=>$info["openid"],"avatar"=>str_replace("/0","/46",$info["headimgurl"]),"sex"=>$info["sex"]));
            $res1 = $bmobUser->login($name,$password);
            $info=json_encode($res1);
            $info=json_decode($info,true);
		}*/
		// var_dump($access_token_oauth2);
		// $userinfo = $weixin->get_user_info($access_token_oauth2['openid']); //此方法能获取更详细的数据
		// var_dump($userinfo);
?>

<html lang="zh-cn">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<title>别来无恙</title>
		<link rel="stylesheet"  href="../css/reset.css">
        <link rel="stylesheet"  href="../css/navbottom.css">
		<link rel="stylesheet"  href="../css/style.css">
		<link rel="stylesheet"  href="../css/iconfont.css">
		<script type="text/javascript" src="../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../srcjs/bmob.js"></script>
        <script src="../js/iconfont.js"></script>
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
	              <a href="../funny/love_heart/index.html"><li class="daohang">our love story</li><a>
	              <li class="daohang1">导航</li>
	              <li class="daohang1">导航</li>
	          </ul>
	      </div>

	      <div id='shownav' class="shownav">
	          <i class="iconfont icon-unorderedlist" style="font-size:20px"></i>
	      </div>

          <?php  $bottom =new Bottomnav("1");$bottom->Bottom() ?>

	    <script type="text/javascript">
	  	//Bmob.initialize("Application ID", "REST API Key");
	      Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");

	      $(document).ready(function()
	      {
	          var height = $(window).height();
	          $(document.body).css('height',height);
              localStorage["state"]=0;
              localStorage["objectid"]="<?php echo $info["objectId"];?>";
              localStorage["username"]="<?php echo $info["username"];?>";
              localStorage["avatar"]="<?php echo $info["avatar"];?>";
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

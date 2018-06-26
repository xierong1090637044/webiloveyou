<?php
header("Content-type:text/html;charset=utf-8");
include_once '../weixin.class.php';
include_once '../phpcj/navbottom.php';
include_once '../lib/BmobUser.class.php';
include_once '../lib/BmobBql.class.php';

$weixin = new class_weixin();
$bmobUser = new BmobUser();

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
        $city = $userinfo["city"];
        $province = $userinfo["province"];

        $expire=time()+60*60*24*30;
        setcookie("username", $name, $expire);
        setcookie("password", $password, $expire);

        try {
            $res = $bmobUser->register(array("username"=>$userinfo["nickname"], "password"=>$userinfo["openid"],"openid"=>$userinfo["openid"],"avatar"=>str_replace("/0","/46",$userinfo["headimgurl"]),"sex"=>$userinfo["sex"],"city"=>$province.$city));
        } catch (Exception $e) {
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
?>

<html lang="zh-cn">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
		<title>别来无恙</title>
		<link rel="stylesheet"  href="../css/reset.css">
        <link rel="stylesheet"  href="../css/navbottom.css">
		<link rel="stylesheet"  href="../css/style.css">
		<link rel="stylesheet"  href="../css/iconfont.css">
        <link rel="stylesheet"  href="../cjcss/danmu.css">
		<script type="text/javascript" src="../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../srcjs/bmob.js"></script>
        <script type="text/javascript" src="../cjjs/danmu.js"></script>
        <script src="../js/iconfont.js"></script>
	</head>
	<body ontouchstart="">
        <div class="MobMain">
		<div id="main" class="main">
            <div class="overplay">
                <img src="<?php echo $info["avatar"];?>" class="avatar">
                <div class="nickname"><?php echo $info["username"];?></div>
            </div>
	    </div>

        <!--<button id="stop" class="btn btn-primary">停止</button>-->
        <!--<button id="open" class="btn btn-primary">弹</button>-->
        <div class="inputdanmu">
            <input type="text" class="form-control" name="" id="barrage_content" placeholder="发送弹幕,最多15个字" maxlength=15>
            <button class="btn btn-primary" id="submit_barraget">发送</button>
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
      </div>
        <?php  $bottom =new Bottomnav("1");$bottom->Bottom() ?>

	    <script type="text/javascript">
	  	//Bmob.initialize("Application ID", "REST API Key");
	      Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");

	      $(document).ready(function()
	      {
	          var height = $(window).height();
	          $(document.body).css('height',height);
              $(".MobMain").css('height',height);
              var state =localStorage["state"];
              if(state ==null || state =="")
              {
                  localStorage["state"]=0;
              }
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
        <script type="text/javascript" src="../cjjs/creatdanmu.js"></script>
	</body>
</html>

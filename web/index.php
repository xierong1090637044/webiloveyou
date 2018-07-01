<?php
include_once '../weixin.class.php';
include_once '../phpcj/showtoast.php';
include_once '../phpcj/mask.php';
include_once '../phpcj/qrcodeshow.php';
include_once '../phpcj/button.php';
include_once '../phpcj/indexcaidan.php';
include_once '../lib/BmobUser.class.php';

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
        <link rel="stylesheet"  href="../css/common.css">
		<link rel="stylesheet"  href="../css/style.css">
        <link rel="stylesheet"  href="../css/duihuakuang.css">
		<link rel="stylesheet"  href="../css/iconfont.css">
        <link rel="stylesheet"  href="../cjcss/toast.css">
		<script type="text/javascript" src="../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../srcjs/bmob.js"></script>
        <script type="text/javascript" src="../cjjs/qrcode.js"></script>
        <script src="../js/iconfont.js"></script>
	</head>
	<body ontouchstart="">

        <div id="stars" class="stars">
            <div class="star" style="top: 0px;left: 520px;"></div>
        </div>
        <div class="MobMain">

		<div id="main" class="main">
            <div class="overplay">
                <img src="<?php echo $info["avatar"];?>" class="avatar">
                <div class="nickname"><?php echo $info["username"];?></div>
            </div>
            <div class="thisisxk">
                <img src="../images/thisxk.png" class="thisisxkimg"/>
            </div>
	    </div>

        <img src="../images/welook.png" class="welook" style="width:28%;"/>
        <?php  $bottom =new Caidan();$bottom->caidan() ?>
        <div class="helplover">
                <div class="changelife">一份爱心，都有可能改变他们的命运</div>
                <img src="../images/helplover/flyherat.png" style="float:right;width:10%;margin-top:2px;margin-right:2%;" />
                <img id ='header-img' src="../images/helplover/frist.png" style="width:100%;border-radius:4px"/>
        </div>

        <div id="sky">
			<div class="bird">
				<div class="bird_body">
					<div class="bird_head"></div>
					<div class="bird_wing_left">
						<div class="bird_wing_left_top"></div>
					</div>
					<div class="bird_wing_right">
						<div class="bird_wing_right_top"></div>
					</div>
					<div class="bird_tail_left"></div>
					<div class="bird_tail_right"></div>
				</div>
			</div>
		</div>

        <div class="header-item">
            <img src="../images/helplover/logo.png" style="width:30%;float:left"/>
            <div class="whereis">
                <div>网址：http://www.unicef.cn/cn/</div>
                <div>微信号：联合国儿童基金会</div>
            </div>
            <div class="jianjie">
                <img src="../images/helplover/1.png" style="width:100%;float:left;margin-top:5%"/>
            </div>
            <div class="header-text">更多详情,请去他们的官网或者微信号</div>
        </div>

        <div class="talk-bubble-index tri-right border round btm-left-in" id='woman'>
          <div class="talktext">
            <p style ='font-size:12px'>笑，全世界便与你同声笑，哭，你便独自哭。所以请坚强，陌生人</p>
          </div>
        </div>

        <div class="talk-bubble-index-1 tri-right round border right-top" id='man'>
          <div class="talktext">
            <p style="font-size:12px;color:#4b1111">也许爱不是热情，也不是怀念，</br>不过是岁月，年深月久成了生活的一部分。</p>
          </div>
        </div>

        <div class="talk-bubble-index-2 tri-right round border right-top" id='flybrid'>
          <div class="talktext">
            <p style="font-size:12px;color:#4b1111">你好，我是“小鹤”</br>接下来暂时由我担任您的吉祥物！</p>
          </div>
        </div>
        <?php  $mask =new Mask;$mask->mask() ?>
        <?php  $toast =new showToast("toast","内容不能为空哦！");$toast->showtoast() ?>
        <?php  $mask =new Qrcode;$mask->qrcode() ?>
        <?php  $mask =new Button('guanbi','关闭','header-button');$mask->button() ?>
      </div>

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

              var flybrid = localStorage['flybrid'];
              if(flybrid ==1)
              {
                  $('#sky').addClass('sky');
              }

              setTimeout(function(){
                  $('#man').fadeIn('slow',function(){
                      setTimeout(function(){
                          var state = localStorage['flybrid'];
                          if(state ==''||state ==null)
                          {
                              localStorage["flybrid"] = 0;
                          }
                          $('#man').fadeOut('slow');
                      },5000)
                  });
              },5000);

              setTimeout(function(){
                  $('#woman').fadeIn('slow',function(){
                      setTimeout(function(){
                          $('#woman').fadeOut('slow');
                          var bridstate = localStorage["flybrid"];
                          if(bridstate ==0)
                          {
                              $('#flybrid').fadeIn('slow');
                              $('#sky').fadeIn('slow',function(){
                                  localStorage["flybrid"] = 1;
                                  $('#flybrid').fadeOut(5000);
                                  $('#sky').animate({top:'88%',right:'22%'},5000,function(){
                                  });
                              });
                          }
                      },5000)
                  });
              },7000)
          })

          $('#header-img').click(function(){
              $('#mask').css('display','block');
              $('#guanbi').css('display','block');
              $('.header-item').css('display','block');
          });

          $('#mask').click(function(){
              $('#mask').css('display','none');
              $('#guanbi').css('display','none');
              $('.header-item').css('display','none');
              $('#qrcode').css('display','none');
          });

          $('#guanbi').click(function(){
              $('#mask').css('display','none');
              $('#guanbi').css('display','none');
              $('.header-item').css('display','none');
          });

          var stars = document.getElementById('stars')
          var star = document.getElementsByClassName('star')
          // js随机生成流星
          for (var j = 0; j < 15; j++) {
              var newStar = document.createElement("div")
              newStar.className = "star"
              newStar.style.top = randomDistance(30, -30) + 'px'
              newStar.style.left = randomDistance(150, 20) + 'px'
              stars.appendChild(newStar)
          }
          // 封装随机数方法
          function randomDistance(max, min) {
              var distance = Math.floor(Math.random() * (max - min + 1) * 10 + min)
              return distance
          }
          // 给流星添加动画延时
          for (var i = 0, len = star.length; i < len; i++) {
              if (i % 6 == 0) {
                  star[i].style.animationDelay = '0s'
              } else {
                  star[i].style.animationDelay = i * 2 + 's'
              }
          }
	    </script>

	</body>
</html>

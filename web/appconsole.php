<?php
    require_once '../res/GetUser.php';

    $user = new GetUser;
    $nickname = $user->nickname();
    $avatar = $user->avatar();
    if(!$user->appconsole()) header('location:../web/depweb/404.php');
?>

<html lang="zh-cn">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<title>后台</title>
        <link rel="stylesheet"  href="../css/bootstrap.min.css">
		<link rel="stylesheet"  href="../css/iconfont1.css">
		<script type="text/javascript" src="../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../srcjs/bmob.js"></script>
        <script src="../js/iconfont.js"></script>
	</head>
    <style>
      .Mobcontent
      {
          padding: 15px;
      }
      .avatar
      {
          width: 4rem;
          height: 4rem;
          border-radius: 50%;
      }
      .avatarandname
      {
          display: flex;
          margin: 0px 0px 10px;
          line-height: 4rem;
      }
      .nickname
      {
          margin: 0 0 0 10px;
      }
      .lineheight
      {
          line-height: 2rem;
      }
      .lineheight1
      {
          line-height: 2rem;
          color:#fff;
          max-width:50%;
          background:#202a36;
          border-radius: 20px;
          text-align: center;
      }
    </style>
	<body ontouchstart="">
     <div class="Mobcontent" id="Mobcontent">
        <div class="avatarandname">
           <img src="<?php echo $avatar;?>" class="avatar">
           <div class="nickname">
               <div class="lineheight"><?php  echo $nickname;?></div>
               <div class="lineheight1">管理员</div>
           </div>
        </div>
     </div>
	</body>
</html>

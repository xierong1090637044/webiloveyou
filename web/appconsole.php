<?php
    require_once '../res/GetUser.php';

    $user = new GetUser;
    var_dump($user->appconsole());

    if($user->appconsole())
    {
        header('location:../web/depweb/404.php'); 
    }else {

    }
?>

<html lang="zh-cn">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<title>后台</title>
        <link rel="stylesheet"  href="../css/bootstrap.min.css">
		<link rel="stylesheet"  href="../css/iconfont.css">
		<script type="text/javascript" src="../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../srcjs/bmob.js"></script>
        <script src="../js/iconfont.js"></script>
	</head>
	<body ontouchstart="">


	</body>
</html>

<?php
require_once('../weixin.class.php');
include_once '../lib/BmobUser.class.php';
include_once '../lib/BmobBql.class.php';

$bmobUser = new BmobUser();
$objectId = $_COOKIE["objectId"];
$res = $bmobUser->get($objectId);
$info=json_encode($res);
$info=json_decode($info,true);
?>

<html lang="zh-cn">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<title>快递服务</title>
        <link rel="stylesheet"  href="../css/bootstrap.min.css">
		<link rel="stylesheet"  href="../css/iconfont.css">
		<script type="text/javascript" src="../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../srcjs/bmob.js"></script>
        <script src="../js/iconfont.js"></script>
        <script type="text/javascript" src="../js/webjs/express1.js"></script>
        <script type="text/javascript" src="../js/bootstrap.js"></script>
        <style>
        body
        {
            background-color: #fafafa;
            overflow: hidden;
        }
        .Mobcontent
        {
            padding: 10px;
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
        .dropdown1
        {
            margin: 0 0 10px;
        }
        .dropdown2
        {
            margin: 0;
            float: left;
            display: inline-block;
        }
        input:focus
        {
            border:unset !important;
            outline: unset;
        }
        .input
        {
            border:unset !important;
            outline: unset;
            line-height: 34px;
            background: unset;
            width: calc(100% - 89px);
            margin: 0 0 0 5;
        }
        .inputele
        {
            border:1px solid#666;
            width: 80%;
            padding: 0px 5px 0 0px;
            margin: 0 auto;
        }
        .iconsousuo
        {
            font-size: 25px;
            float: right;
        }
        .choosecontent
        {
            border:1px solid#666;
            border-radius: 4px;
            background: #fff;
            padding: 10px;
            min-height: 50vh;
            max-height: 80vh;
            overflow: scroll;
            margin-bottom: 10px;
        }
        .toast
        {
            background: #666;
            color:#fff;
            line-height: 30px;
            font-size: 14px;
            padding: 5px 10px;
            visibility: hidden;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            bottom: 20%;
            left:10%;
            right: 10%;
        }
        .companyname
        {
            padding: 10px 5px;
            border-bottom: 1px solid#ddd;
            display: none;
        }
        .alllist
        {
            font-size: 12px;
            padding: 8px 4px;
        }
        .listtime
        {
            float: right;
            width: 100%;
            border-bottom: 1px solid#ddd;
            line-height: 30px;
            text-align: right;
        }
        .dropdown-item1
        {
            display: block;
            width: 100%;
            padding: .25rem .5rem;
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: center;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }
        .dropdown-toggle1
        {
            border-radius: unset !important;
        }
        .btn
        {
            height: 36px;
        }
        </style>
	</head>
	<body>
     <div class="Mobcontent" id="Mobcontent">
        <div class="avatarandname">
           <img src="<?php echo $info["avatar"];?>" class="avatar">
           <div class="nickname"><?php echo $info["username"];?></div>
        </div>
        <div class="dropdown dropdown1">
             <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                查询快递
             </button>
             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                 <a class="dropdown-item" id='item'>查询快递</a>
                 <a class="dropdown-item" id="item1">我要寄件</a>
             </div>
         </div>

         <div class="choosecontent" id="content">
             <div class="inputele">
                <div class="dropdown dropdown2">
                     <button class="btn btn-secondary dropdown-toggle1" type="button" id="kdcompany" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         顺丰
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                         <a class="dropdown-item1"  id = "dropdownitem" data-idx="shunfeng">顺丰</a>
                         <a class="dropdown-item1" id = "dropdownitem" data-idx="shentong">申通</a>
                         <a class="dropdown-item1" id = "dropdownitem" data-idx="yunda">韵达</a>
                         <a class="dropdown-item1" id = "dropdownitem" data-idx="yuantong">圆通</a>
                         <a class="dropdown-item1" id = "dropdownitem" data-idx="zhongtong">中通</a>
                     </div>
                 </div>
               <input placeholder="请输入快递单号" class="input" maxlength="30" id="input">
                <i class="iconfont icon-sousuo2 iconsousuo" id='getdetail'></i>
           </div>
           <div id="companyname" class="companyname"></div>
           <div id="listitem" class="alllist">
           </div>
         </div>

          <div class="choosecontent" id="content1" style="display:none">
          </div>

         <div id='toast' class="toast"></div>
     </div>
	</body>
</html>

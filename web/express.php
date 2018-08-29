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
		<link rel="stylesheet"  href="../css/iconfont1.css">
		<link rel="stylesheet"  href="../css/webcss/express.css">
		<script type="text/javascript" src="../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../srcjs/bmob.js"></script>
        <script src="../js/iconfont.js"></script>
        <script type="text/javascript" src="../js/webjs/express1.js"></script>
        <script type="text/javascript" src="../js/bootstrap.js"></script>
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

          <div class="choosecontent" id="content1" style="display:none;text-align:center">
			  <div>
				  <span style="display: inline-block;width: 80px;text-align:right">您的名字</span>
				  <input placeholder="您的名字" maxlength="10" type="text" class="inputadd" id="input1">
			  </div>
			  <div>
				  <span style="display: inline-block;width: 80px;text-align:right">您的手机</span>
				  <input placeholder="您的联系电话" maxlength="11" type="number" class="inputadd" id="input2">
			  </div>
			  <div>
				  <span style="display: inline-block;width: 80px;text-align:right">您的地址</span>
				  <input placeholder="取件地址" maxlength="30" type="text" class="inputadd" id="input3">
			  </div>
			  <div>
				  <span style="display: inline-block;width: 80px;text-align:right">收件人姓名</span>
				  <input placeholder="收件人姓名" maxlength="10" type="text" class="inputadd" id="input4">
			  </div>
			  <div>
				  <span style="display: inline-block;width: 80px;text-align:right">收件人电话</span>
				  <input placeholder="收件人联系方式" maxlength="11" type="number" class="inputadd" id="input5">
			  </div>
			  <div>
				  <span style="display: inline-block;width: 80px;text-align:right">收件人地址</span>
				  <input placeholder="收件人地址" maxlength="30" type="text" class="inputadd" id="input6">
			  </div>
			  <div>
				  <span style="display: inline-block;width: 80px;text-align:right">备注</span>
				  <input placeholder="备注（可不填）" maxlength="30" type="text" class="inputadd" id="input7">
			  </div>
			  <button type="button" class="btn btn-success" style="margin:20px 0 10px;width:160px" id='submit'>提交</button>
          </div>

		  <div class="choosecontent1" id="content2" style="display:none;text-align:center"></div>

		  <button id='giveup'type="button" class="btn btn-primary giveup" data-toggle="modal" data-target="#exampleModalCenter">取消</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">是否取消</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        您是否决定取消此快递订单
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="delete">确定</button>
      </div>
    </div>
  </div>
</div>
         <div id='toast' class="toast"></div>
     </div>
	</body>
</html>

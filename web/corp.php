<?php
include_once '../phpcj/navbottom.php';
include_once '../phpcj/showtoast.php';
include_once '../phpcj/button.php';
?>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>创建我的表白墙</title>
  <link rel="stylesheet" href="../css/common.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/cropper.css">
  <link rel="stylesheet"  href="../cjcss/toast.css">
</head>
<body>
  <div class="MobMain">
    <label class="wiyaddimg-item">
      <img class="wiyaddimg" id="avatar" src="../images/add.png">
      <input type="file" class="sr-only" id="input" name="image" accept="image/*">
    </label>

    <!--裁剪照片的弹出框-->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">裁剪图片</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="img-container">
              <img id="image" src="../images/add.png">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            <button type="button" class="btn btn-primary" id="crop">裁剪</button>
          </div>
        </div>
      </div>
    </div>

    <div class="wiyinput-ele">
        <div style="margin:10px 0px 10px 0px">
            <input class="tellobject" maxlength=8 placeholder="表白对象"id="tellobject"/></div>
        <div style="margin:30px 0px 10px 0px">
            <textarea class="tellcontent" maxlength=50 placeholder="你想对他/她/它说的第一句话" id="tellcontent"></textarea></div>

            <?php  $button =new Button("confrim","确定" ,"buttonposition");$button->button()?>
            <?php  $button =new Button("reset","重置" ,"buttonposition1");$button->button()?>
    </div>

    <?php  $toast =new showToast("toast","选择图片不能超过4M哦！");$toast->showtoast() ?>
    <?php  $toast =new showToast("toast1","内容不能有空并且字数不能少于15个字哦！");$toast->showtoast() ?>
    <?php  $toast =new showToast("toast2","请上传表白墙的宣传图！");$toast->showtoast() ?>
    <?php  $toast =new showToast("toast3","已有该表白墙，请勿重新创建！");$toast->showtoast() ?>
    <?php  $toast =new showToast("toast4","创建成功！");$toast->showtoast() ?>
  </div>

  <script type="text/javascript" src="../srcjs/jquery.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="../cjjs/cropper.js"></script>
  <script type="text/javascript" src="../srcjs/bmob.js"></script>
  <script type="text/javascript" src="../js/outerjs/corp.js"></script>
  <script>

  </script>
</body>
</html>

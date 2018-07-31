<?php
require('../phpcj/mask.php');
require('../phpcj/button.php');
include_once '../phpcj/showtoast.php';
?>

<html lang="zh-cn">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<title>上传图片</title>
        <link rel="stylesheet" type="text/css" href="../css/uploadimg.css" />
        <link rel="stylesheet"  href="../css/common1.css">
        <link rel="stylesheet"  href="../cjcss/toast.css">
        <link rel="stylesheet"  href="../css/base.css" />
		<script type="text/javascript" src="../srcjs/jquery.min.js"></script>
		<script type="text/javascript" src="../srcjs/bmob.js"></script>
        <script src="../js/iconfont.js"></script>
        <script src="../js/isyou.js"></script>

	</head>
    <body>
        <svg class="hidden">
			<symbol id="icon-arrow" viewBox="0 0 24 24">
				<title>arrow</title>
				<polygon points="6.3,12.8 20.9,12.8 20.9,11.2 6.3,11.2 10.2,7.2 9,6 3.1,12 9,18 10.2,16.8 "/>
			</symbol>
			<symbol id="icon-drop" viewBox="0 0 24 24">
				<title>drop</title>
				<path d="M12,21c-3.6,0-6.6-3-6.6-6.6C5.4,11,10.8,4,11.4,3.2C11.6,3.1,11.8,3,12,3s0.4,0.1,0.6,0.3c0.6,0.8,6.1,7.8,6.1,11.2C18.6,18.1,15.6,21,12,21zM12,4.8c-1.8,2.4-5.2,7.4-5.2,9.6c0,2.9,2.3,5.2,5.2,5.2s5.2-2.3,5.2-5.2C17.2,12.2,13.8,7.3,12,4.8z"/><path d="M12,18.2c-0.4,0-0.7-0.3-0.7-0.7s0.3-0.7,0.7-0.7c1.3,0,2.4-1.1,2.4-2.4c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C15.8,16.5,14.1,18.2,12,18.2z"/>
			</symbol>
			<svg id="icon-github" viewBox="0 0 33 33">
				<title>github</title>
				<path d="M16.608.455C7.614.455.32 7.748.32 16.745c0 7.197 4.667 13.302 11.14 15.456.815.15 1.112-.353 1.112-.785 0-.386-.014-1.411-.022-2.77-4.531.984-5.487-2.184-5.487-2.184-.741-1.882-1.809-2.383-1.809-2.383-1.479-1.01.112-.99.112-.99 1.635.115 2.495 1.679 2.495 1.679 1.453 2.489 3.813 1.77 4.741 1.353.148-1.052.569-1.77 1.034-2.177-3.617-.411-7.42-1.809-7.42-8.051 0-1.778.635-3.233 1.677-4.371-.168-.412-.727-2.069.16-4.311 0 0 1.367-.438 4.479 1.67a15.602 15.602 0 0 1 4.078-.549 15.62 15.62 0 0 1 4.078.549c3.11-2.108 4.475-1.67 4.475-1.67.889 2.242.33 3.899.163 4.311C26.37 12.66 27 14.115 27 15.893c0 6.258-3.809 7.635-7.437 8.038.584.503 1.105 1.497 1.105 3.017 0 2.177-.02 3.934-.02 4.468 0 .436.294.943 1.12.784 6.468-2.159 11.131-8.26 11.131-15.455 0-8.997-7.294-16.29-16.291-16.29"></path>
			</svg>
			<svg id="icon-rewind" viewBox="0 0 36 20">
				<title>rewind</title>
				<path d="M16.315.061c.543 0 .984.44.984.984v17.217c0 .543-.44.983-.984.983L.328 10.391s-.738-.738 0-1.476C1.066 8.178 16.315.061 16.315.061zM35.006.061c.543 0 .984.44.984.984v17.217c0 .543-.44.984-.984.984L19.019 10.39s-.738-.738 0-1.475C19.757 8.178 35.006.06 35.006.06z"/>
			</svg>
		</svg>
        <div class="MainMob">
            <div id="wrapper" class="wrapper">
                <div id="image-holder" class="image-holder"> </div>
				<div class="uploadimg">
					<input id="fileUpload" type="file"  class="uploadimg1"/>
					<div id="noticecontent" class="noticecontent">上传图片</div>
			    </div>
                <textarea id="textUpload" type="text" maxlength="50"  class="uploadtext" placeholder="输入一段你想对他/她说的话"></textarea>
            </div>

            <div class="grid__item theme-1">
                <button class="action"><svg class="icon icon--rewind"><use xlink:href="#icon-rewind"></use></svg></button>
                <button class="particles-button" id="upload">Send</button>
            </div>
        </div>
        <?php  $toast =new showToast("toast","不能不填哦！","addtoaststyle");$toast->showtoast() ?>
        <?php  $toast =new showToast("toast1","上传成功了！","addtoaststyle");$toast->showtoast() ?>
		<?php  $toast =new showToast("toast2","内容不能少于15个字哦！","addtoaststyle");$toast->showtoast() ?>
		<?php  $toast =new showToast("toast3","图片尺寸最大不能超过4M哦！","addtoaststyle");$toast->showtoast() ?>
		<?php  $toast =new showToast("toast4","请上传图片！","addtoaststyle");$toast->showtoast() ?>
		<?php  $toast =new showToast("toast5","图片尺寸最小不能低于10kb哦！！","addtoaststyle");$toast->showtoast() ?>

        <script src='../srcjs/anime.min.js'></script>
        <script src='../srcjs/particles.js'></script>
        <script src='../srcjs/demo.js'></script>
        <script type="text/javascript">
        Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");
		var height = $(window).height();
		$(".MainMob").css('height',height);
        $("#fileUpload").on('change', function (e) {
            //获取上传文件的数量
			var files = e.target.files[0];
            var countFiles = $(this)[0].files.length;
            var imgPath = $(this)[0].value;
			var uploadsize = files==null?0:files.size;
			var allowsize = 4200000;
			var minsize = 10000;
            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            var image_holder = $("#image-holder");
            image_holder.empty();
			if (uploadsize < minsize) {
				$('#toast5').css('display','block');
				setTimeout(function(){
					$('#toast5').css('display','none');
				},2000);
			}
			else {
				if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                    if (typeof (FileReader) != "undefined") {
                        // 循环所有要上传的图片
                         for (var i = 0; i < countFiles; i++) {
                             var reader = new FileReader();
                             reader.onload = function (e) {
                                 $("<img />", {
                                     "src": e.target.result,
                                     "class": "thumb-image"
                                  }).appendTo(image_holder);

   							   $("#noticecontent").html("重新上传");
                              }
                               image_holder.show();
                               reader.readAsDataURL($(this)[0].files[i]);
                            }
                        }
                    }
			}
		});

              //上传图片到bmob
              $("#upload").click(function(){
                  var fileUploadControl = $("#fileUpload")[0];
				  var file = fileUploadControl.files[0];
				  console.log(file);
                  var text = $('#textUpload').val();
                  var content = text.split("\n").join("<br/>");
				  //content = text.replace(/_@/g, '<br/>');//IE9、FF、chrome
				  content = content.replace(/\s/g, '&nbsp;');//空格处理
                  if(file == null)
                  {
                     $('#toast4').css('display','block');
                     setTimeout(function(){
                         $('#toast4').css('display','none');
                     },1000);
                  }
				  else if (text.length <=15) {
					  $('#toast2').css('display','block');
  					setTimeout(function(){
  						$('#toast2').css('display','none');
  					},1000);
				  }
				  else if (text =="") {
					  $('#toast').css('display','block');
  					setTimeout(function(){
  						$('#toast').css('display','none');
  					},1000);
				  }
                  else {
                      var file = fileUploadControl.files[0];
					  var username = localStorage["username"];
					  var avatar = localStorage["avatar"]
                      var name = username+".jpg";
                      var file = new Bmob.File(name, file);
                      file.save().then(function(obj) {
                         var url = obj.url();
                         var GameScore = Bmob.Object.extend("isyou");
                         var User = Bmob.Object.extend("_User");
                         var gameScore = new GameScore();
                         var user = new User();
                         var id = localStorage["objectid"];
                         user.id = id;
                         gameScore.set("content", content);
                         gameScore.set("imgurl",url);
                         gameScore.set("parent",user);
						 gameScore.set("mastername",username);
						 gameScore.set("masteravatar",avatar);
                         gameScore.save(null, {
                             success: function(gameScore) {
								 $('#toast1').css('display','block');
								 setTimeout(function(){
									 $('#toast1').css('display','none');
									 history.go(-1);
									 window.location.reload();
								 },1000);

                             },
                         });
                      });
                  }
          })

        </script>
	</body>
</html>

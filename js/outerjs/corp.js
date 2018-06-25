Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");
  var uploadimgid = localStorage["uploadimgid"];
  if(uploadimgid !=null)
  {
      localStorage.removeItem('uploadimgid');
  }
  window.addEventListener('DOMContentLoaded', function () {
    var cropBoxData;
    var canvasData;
    var avatar = document.getElementById('avatar');
    var image = document.getElementById('image');
    var input = document.getElementById('input');
    var $alert = $('.alert');
    var $modal = $('#modal');
    var cropper;

    input.addEventListener('change', function (e) {
      var files = e.target.files;
      var done = function (url) {
        input.value = '';
        image.src = url;
        $alert.hide();
        $modal.modal('show');
      };
      var reader;
      var file;
      var url;

      if (files && files.length > 0) {
        file = files[0];
        var uploadsize = file.size;
        var allowsize = 4200000;
        if(uploadsize>allowsize)
        {
            $('#toast').css('display','block');
            setTimeout(function(){
                $('#toast').css('display','none');
            },1000);
        }else {
            if (URL) {
              done(URL.createObjectURL(file));
            } else if (FileReader) {
              reader = new FileReader();
              reader.onload = function (e) {
                done(reader.result);
              };
              reader.readAsDataURL(file);
            }
        }
      }
    });

    $modal.on('shown.bs.modal', function () {
      cropper = new Cropper(image, {
          dragMode: 'move',
          aspectRatio: 16 / 9,
          autoCropArea: 1,
          restore: false,
          guides: false,
          center: true,
          highlight: true,
          cropBoxMovable: false,
          cropBoxResizable: false,
          toggleDragModeOnDblclick: false,
      });
    }).on('hidden.bs.modal', function () {
      cropper.destroy();
      cropper = null;
    });

    document.getElementById('crop').addEventListener('click', function () {
      var initialAvatarURL;
      var canvas;

      $modal.modal('hide');

      if (cropper) {
        canvas = cropper.getCroppedCanvas({
          width: 320,
          height: 640,
        });

        cropBoxData = cropper.getCropBoxData();
        var height = cropBoxData.height;
        var width = cropBoxData.width;
        console.log(height);
        initialAvatarURL = avatar.src;
        avatar.src = canvas.toDataURL();
        console.log(avatar.src);
        $alert.removeClass('alert-success alert-warning');

        var uploadimgid = localStorage["uploadimgid"];
        if(uploadimgid ==""||uploadimgid ==null)
        {
            var GameScore = Bmob.Object.extend("bbq");
            var gameScore = new GameScore();
            gameScore.set("bgimg", avatar.src);
             gameScore.save(null, {
                 success: function(gameScore) {
                        localStorage["uploadimgid"] = gameScore.id;
                    },
                    error: function(gameScore, error) {
                        // 添加失败
                        alert('添加数据失败，返回错误信息：' + error.description);
                    }
                });
        }
        else {
            var GameScore = Bmob.Object.extend("bbq");
            var query = new Bmob.Query(GameScore);
            query.get(uploadimgid, {
                success: function(gameScore) {
                    gameScore.set("bgimg", avatar.src);
                    gameScore.save();
                }
            });
        }
    }
});

//上传图片返回事件
$(function(){
    pushHistory();
    window.addEventListener("popstate", function(e) {
        var uploadimgid = localStorage["uploadimgid"];
        console.log(uploadimgid);
        if (uploadimgid ==null ||uploadimgid=="") {
            console.log("不删除");
            window.location.href="havewords.php";
        }else {
            var GameScore = Bmob.Object.extend("bbq");
            var query = new Bmob.Query(GameScore);
            query.get(uploadimgid, {
                success: function(object) {
                    object.destroy({
                        success: function(deleteObject) {
                            localStorage.removeItem('uploadimgid');
                            window.location.href="havewords.php";
                        },
                    });
                },
            });
        }
    });
    function pushHistory() {
        window.history.pushState(null, "title","#");
    }
});

$("#confrim").click(function()
{
    var length;
    var tellobject = $("#tellobject").val();
    var tellcontent = $("#tellcontent").val();
    var content = tellcontent.split("\n").join("<br/>");
    content = content.replace(/\s/g, '&nbsp;');

    var mastername = localStorage["username"];
    var masteravatar = localStorage["avatar"];
    var objectid = localStorage["uploadimgid"];

    var GameScore = Bmob.Object.extend("bbq");
    var query = new Bmob.Query(GameScore);
    query.equalTo("tellobject", tellobject);
    // 查询所有数据
    query.find({
        success: function(results) {
            length = results.length
            if(length >= 1)
            {
                $('#toast3').css('display','block');
                setTimeout(function(){
                    $('#toast3').css('display','none');
                },1000);
            }
            else {
                if(tellobject =="" || tellcontent=="" || tellcontent.length<15)
                {
                    $('#toast1').css('display','block');
                    setTimeout(function(){
                        $('#toast1').css('display','none');
                    },1000);
                }
                else if (objectid ==null) {
                    $('#toast2').css('display','block');
                    setTimeout(function(){
                        $('#toast2').css('display','none');
                    },1000);
                }
                else {
                    var GameScore = Bmob.Object.extend("bbq");
                    var query = new Bmob.Query(GameScore);
                    query.get(objectid, {
                        success: function(object) {
                            // The object was retrieved successfully.
                            object.set("mastername", mastername);
                            object.set("masteravatar", masteravatar);
                            object.set("tellobject", tellobject);
                            object.set("comment", 1);
                            object.save(null, {
                                success: function(objectUpdate) {
                                    //alert("create object success, object score:"+objectUpdate.get("score"));
                                    var GameScore = Bmob.Object.extend("bbqdetails");
                                    var User = Bmob.Object.extend("_User");
                                    var Bbq = Bmob.Object.extend("bbq");
                                    var gameScore = new GameScore();
                                    var bbq = new Bbq();
                                    var user = new User();
                                    user.id = localStorage["objectid"];
                                    bbq.id = objectid;
                                    gameScore.set("tellcontent", content);
                                    gameScore.set("username", mastername);
                                    gameScore.set("useravater", masteravatar);
                                    gameScore.set("masterbbq", objectid);
                                    gameScore.set("parent", user);
                                    gameScore.set("parent1", bbq);
                                    gameScore.save(null, {
                                         success: function(object) {
                                             $('#toast4').css('display','block');
                                             setTimeout(function(){
                                                 $('#toast4').css('display','none');
                                                 localStorage.removeItem('uploadimgid');
                                                 window.location.href="havewords.php";
                                             },1000);
                                         },
                                     });
                                },
                            });
                        },
                    });
                }
            }
        }
    });
})

    $('#reset').click(function(){
        $('#tellobject').val("");
        $('#tellcontent').val("");
    })


});

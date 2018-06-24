Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");
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
        var allowsize = 2100000;
        if(uploadsize>allowsize)
        {
            console.log("ssss");
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
            var GameScore = Bmob.Object.extend("GameScore");
            var gameScore = new GameScore();
            gameScore.set("score", avatar.src);
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
            var GameScore = Bmob.Object.extend("GameScore");
            var query = new Bmob.Query(GameScore);
            query.get(uploadimgid, {
                success: function(gameScore) {
                    gameScore.set("score", avatar.src);
                    gameScore.save();
                }
            });
        }
    }
});


});

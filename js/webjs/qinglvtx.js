$(document).ready(function(){
    imgquery("qinglvtx","property","1");
    imgquery("qinglvtx","property","2");
    imgquery("qinglvtx","property","3");
    imgquery("qinglvtx","property","4");
    appendItem(4);

    $('body').on("click",'#getmore',function()
    {
        var id = $(this).attr('dataid');
        $('#content').css('display','block');
        $('.secondcontent'+id).removeClass('hidden');
        $('#mask').css('display','block');
    })

    $('#mask').click(function(){
        $('.secondcontent1').addClass('hidden');
        $('.secondcontent2').addClass('hidden');
        $('.secondcontent3').addClass('hidden');
        $('.secondcontent4').addClass('hidden');
        $('#content').css('display','none');
        $('#mask').css('display','none');
    })
})


  function imgquery(dbname,tablename,index) {
      Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");
      var GameScore = Bmob.Object.extend(dbname);
      var query = new Bmob.Query(GameScore);
      query.equalTo(tablename, index);
      // 查询所有数据
      query.find({
          success: function(results) {
              // 循环处理查询到的数据
              for (var i = 0; i < results.length; i++) {
                  var object = results[i];
                  if (index == '1') {
                      var img1 = object.get('imgs')._url;
                      $('.secondcontent1').append('<div class="imgcontent"><div class="imgitem"><img class="img-showing" src='+img1+
                      '></img></div></div>')
                  }else {
                      var img1 = object.get('imgs')._url;
                      var img2 = object.get('img1')._url;
                      $('.secondcontent'+index).append('<div class="imgcontent"><div class="imgitem"><img class="img-showing2" src='+img1+
                      '></img><img class="img-showing3" src='+img2+'></img></div></div>')
                  }
              }
          }
      });
  }

  function appendItem(index)
  {
      for (var i = 1; i < index+1; i++) {
          switch (i) {
              case 1:
                  text='久违的恩爱，甜蜜清新风的情侣头像.'
              break;
              case 2:
                  text='你侬我侬的情侣男女生专属微信头像图片.'
              break;
              case 3:
                  text='我和你，左右右左，拼凑一起，才是完整。分享这样一组情侣头像，感谢喜欢.'
              break;
              case 4:
                  text='点遇见你没关系，但愿余生都是你.'
              break;
              default:

          }
          $(".MobMain").append('<div class="imgrecommend">'+
          '<div class="textrecimg">'+text+'</div>'+
          '<img class="contentimg" src="../../images/qinglvtx/'+i+(index+1)+'.jpg" />'+
          '<img class="contentimg" src="../../images/qinglvtx/'+i+index+'.jpg" />'+
          '<div class="getmore" id="getmore" dataid="'+i+'">查看更多</div></div>')
      }
  }

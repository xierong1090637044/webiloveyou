$(document).ready(function(){
Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");

$("#loading").css('display','flex');

var arr = [];
localStorage.setItem("unlike", JSON.stringify(arr));
var arr = JSON.parse(localStorage.getItem("unlike"));

var GameScore = Bmob.Object.extend("sanhangqs");
var query = new Bmob.Query(GameScore);
query.limit(20);
query.descending("count");
query.find({
     success: function(results) {
         $("#loading").css('display','none');
         console.log("共查询到 " + results.length + " 条记录");
         // 循环处理查询到的数据
         for (var i = 0; i < results.length; i++) {
              var object = results[i];
              var content = object.get('content');
              var title = object.get('title');
              var name = object.get("username");
              var avatar = object.get("avatar");
              var count = object.get("count");
              var time = object.createdAt;
              var id = object.id;
              arr.push(id)
              localStorage.setItem("unlike", JSON.stringify(arr))
             // console.log(object.id + ' - ' + object.get('content'));
              $('.qingshu').find('.content').append("<div class='qsitem'> <div class='qscontent'>"+
               "<div class='qscontent1'> <text>"+content+"</text> </div>"+
               "<span class='qstitle'>"+title+"</span>"+
               "<span class='qstime'>"+time+"</span>"+
               "</div>"+
               "<div class='qsavatar'>"+"<img class='qsavatarimg' src="+avatar+"> </img> </div>"+
               "<div class='heart' rel='like' id="+id+">"+count+"</div>" +
               "</div>");

               // var id = $(this).attr("id");
          }
          setTimeout(function(){
              var like = JSON.parse(localStorage.getItem("like"));
              var unlike = JSON.parse(localStorage.getItem("unlike"));
              for (var i = 0; i < like.length; i++) {
                  var index = $.inArray(like[i],unlike)
                  console.log(index);
                  console.log(like[index]);
                 var count = parseInt($('#'+unlike[index]).html());
                 //$('#'+unlike[index]).html(count+1);
                 $('#'+unlike[index]).addClass("heartAnimation");
              }
              console.log(unlike);
          },1000)
      },
  });

    $('#submit').click(function(){
        var title = $('#biaoti').val();
        var content =$('#cjcontent').val();
        var content1 = content.split("\n").join("<br />");
        var userid = localStorage.objectid;
        console.log(localStorage.objectid);
        console.log(title.length);
        console.log(content1);

        //创建类和实例
        if(title=="" || content =="" )
        {
            $('#toast').css('display','block');
            setTimeout(function(){
                $('#toast').css('display','none');
            },1000);
        }else if (content.length <=15) {
            $('#toast2').css('display','block');
            setTimeout(function(){
                $('#toast2').css('display','none');
            },1000);
        }else {
            var Sanhangqs = Bmob.Object.extend("sanhangqs");
            var User = Bmob.Object.extend("_User");
            var sanhangqs = new Sanhangqs();
            var user = new User();
            var name = localStorage["username"];
            var avatar = localStorage["avatar"];
            user.id = userid;
            sanhangqs.set("title", title);
            sanhangqs.set("username",name);
            sanhangqs.set("avatar",avatar);
            sanhangqs.set("content", content1);
            sanhangqs.set("parent",user);
            sanhangqs.set("count",0);
            //添加数据，第一个入口参数是null
            sanhangqs.save(null, {
                success: function(gameScore) {
                    $('#toast1').css('display','block');
                    $("#loading").css('display','flex');
                    $(".orderby-item").find('#redu').removeClass('border-bottom');
                    $(".orderby-item").find('#time').addClass('border-bottom');
                    setTimeout(function(){
                        $('#toast1').css('display','none');
                        $('#mask').css('display','none');
                        $('#edit').css('display','none');
                    },1000);

                    var arr = [];
                    localStorage.setItem("unlike", JSON.stringify(arr));
                    var arr = JSON.parse(localStorage.getItem("unlike"));
                    var GameScore = Bmob.Object.extend("sanhangqs");
                    var query = new Bmob.Query(GameScore);
                    query.descending("createdAt");
                    query.limit(20); 
                    // 查询所有数
                    query.find({
                         success: function(results) {
                             $("#loading").css('display','none');
                             console.log("共查询到 " + results.length + " 条记录");
                             $('.qingshu').find('.content').empty();
                             // 循环处理查询到的数据
                             for (var i = 0; i < results.length; i++) {
                                  var object = results[i];
                                  var title = object.get('title');
                                  var content = object.get('content');
                                  var name = object.get("username");
                                   var count = object.get("count");
                                  var avatar = object.get("avatar");
                                  var time = object.createdAt;
                                  var id = object.id;
                                  //console.log(object.id + ' - ' + object.get('content'));
                                  arr.push(id)
                                  localStorage.setItem("unlike", JSON.stringify(arr))
                                 // console.log(object.id + ' - ' + object.get('content'));
                                  $('.qingshu').find('.content').append("<div class='qsitem'> <div class='qscontent'>"+
                                   "<div class='qscontent1'> <text>"+content+"</text> </div>"+
                                   "<span class='qstitle'>"+title+"</span>"+
                                   "<span class='qstime'>"+time+"</span>"+
                                   "</div>"+
                                   "<div class='qsavatar'>"+"<img class='qsavatarimg' src="+avatar+"> </img> </div>"+
                                   "<div class='heart' rel='like' id="+id+">"+count+"</div>" +
                                   "</div>")
                              }
                              setTimeout(function(){
                                  var like = JSON.parse(localStorage.getItem("like"));
                                  var unlike = JSON.parse(localStorage.getItem("unlike"));
                                  for (var i = 0; i < like.length; i++) {
                                      var index = $.inArray(like[i],unlike)
                                      console.log(index);
                                      console.log(like[index]);
                                     var count = parseInt($('#'+unlike[index]).html());
                                     //$('#'+unlike[index]).html(count+1);
                                     $('#'+unlike[index]).addClass("heartAnimation");
                                  }
                                  console.log(unlike);
                              },1500)
                          },
                      });
            },
              error: function(gameScore, error) {
                  alert('添加数据失败，返回错误信息：' + error.description);
              }
          });
        }
    });
});

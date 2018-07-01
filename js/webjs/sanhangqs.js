$(document).ready(function(){
  var height = $(window).height();
  $(document.body).css('height',height);
  var state = 'redu';
  var index = 0;

  $(".mobilecontent").find(".qingshu").scroll(function(){
      $(".triangle_border_up").removeClass("display");
      $(".orderby-item").removeClass('display');
  })

  $(".orderby-item").find('#redu').addClass('border-bottom');

  var like =  localStorage["like"];
  console.log(like);
  if(like == null)
  {
      var arr = [];
      localStorage.setItem("like", JSON.stringify(arr))
      //var arr = JSON.parse(localStorage.getItem("arr"))
      //arr.push('something')
      //localStorage.setItem("arr", JSON.stringify(arr))
  }else {
  }

  $('#create').click(function(){
     $('#edit').css('display',"block");
     $('#mask').css('display',"block");
  })

  $('#mask').click(function(){
      $('#edit').css('display',"none");
      $('#mask').css('display',"none");
  });

  $(".mobilecontent").scroll(function(){
      $(".triangle_border_up").removeClass("display");
      $(".orderby-item").removeClass("display");
  });

 //点赞动作
  $('body').on("click",'.heart',function()
  {
      $(this).css("background-position","")
      var id = $(this).attr("id");
      var count = parseInt($(this).html());

      var arr = JSON.parse(localStorage.getItem("like"));
      var index = $.inArray(id,arr);
      if(index == -1)
      {
          arr.push(id);
          localStorage.setItem("like", JSON.stringify(arr));
          $(this).html(count+1);
          $(this).addClass("heartAnimation");

          var GameScore = Bmob.Object.extend("sanhangqs");
          var query = new Bmob.Query(GameScore);
          var count1 = parseInt($(this).html());
          console.log(count1);
          query.get(id, {
              success: function(gameScore) {
                  // 回调中可以取得这个 GameScore 对象的一个实例，然后就可以修改它了
                  gameScore.set('count', count1);
                  gameScore.save();
                   // The object was retrieved successfully
               }
           })
      }
      else
      {
        arr.splice(index, 1);
        localStorage.setItem("like", JSON.stringify(arr));
        $(this).html(count-1);
        $(this).removeClass("heartAnimation");
        $(this).css("background-position","left");

        var GameScore = Bmob.Object.extend("sanhangqs");
        var query = new Bmob.Query(GameScore);
        var count1 = parseInt($(this).html());
        query.get(id, {
            success: function(gameScore) {
                // 回调中可以取得这个 GameScore 对象的一个实例，然后就可以修改它了
                gameScore.set('count', count1);
                gameScore.save();
                 // The object was retrieved successfully
             }
         })
     }
  });

  $('#orderby').click(function(){
      index = 0;
     $(".triangle_border_up").toggleClass("display");
     $(".orderby-item").toggleClass("display");
  });

  $("#time").click(function(){
      state = 'time';
      querybytime();
  });

  $("#redu").click(function(){
      state = 'redu';
      querybyredu();
  });

  $('#getmore').click(function(){
     index +=1;
     skip = index *20;
     console.log(state);
     if(state == 'redu')
     {
         console.log(skip);
         querybyredu(skip)
     }
     else {
         console.log(skip);
         querybytime(skip)
     }
  });

});

     function querybyredu(skip=null){
     $("#loading").css('display','flex');
     $('#redu').addClass("border-bottom");
     $('#time').removeClass("border-bottom");

     var GameScore = Bmob.Object.extend("sanhangqs");
     var query = new Bmob.Query(GameScore);
     // 查询所有数据
     query.limit(20);
     if(skip !=null)
     {
         query.skip(skip);
     }else {
         $('.qingshu').find('.content').empty();
     }
     query.descending("count");
     query.find({
         success: function(results) {
             console.log(results.length);
             $("#loading").css('display','none');
             if (results.length == 20) {
                 $('#getmore').css('display','block')
             }else
             {
                 $('#getmore').css('display','none')
             }
             for (var i = 0; i < results.length; i++) {
                 var object = results[i];
                 var content = object.get('content');
                 var title = object.get('title');
                 var name = object.get("username");
                 var avatar = object.get("avatar");
                 var count = object.get("count");
                 var type = object.get('type');
                 var time = object.createdAt;
                 var id = object.id;
                // console.log(object.id + ' - ' + object.get('content'));
                $('.qingshu').find('.content').append("<div class='qsitem'> <div class='qscontent'>"+
                 "<div class='qscontent1'> <div>"+content+"</div><div class='tyle'><span class='biaoqian'>标签：</span><span class='typestyle'>"+type+
                 "</span></div> </div>"+
                 "<span class='qstitle'>"+title+"</span>"+
                 "<span class='qstime'>"+time+"</span>"+
                 "</div>"+
                 "<div class='qsavatar'>"+"<img class='qsavatarimg' src="+avatar+"> </img> </div>"+
                 "<div class='heart' rel='like' id="+id+">"+count+"</div>" +
                 "</div>");

                  // var id = $(this).attr("id");
                  setTimeout(function(){
                      var like = JSON.parse(localStorage.getItem("like"));
                      var unlike = JSON.parse(localStorage.getItem("unlike"));
                      for (var i = 0; i < like.length; i++) {
                          var index = $.inArray(like[i],unlike)
                         //var count = parseInt($('#'+unlike[index]).html());
                         //$('#'+unlike[index]).html(count+1);
                         $('#'+unlike[index]).addClass("heartAnimation");
                      }
                  },1000)
             }
         }
     });
 }

     function querybytime(skip=null){
     $("#loading").css('display','flex');
     $('#time').addClass("border-bottom");
     $('#redu').removeClass("border-bottom");

     var GameScore = Bmob.Object.extend("sanhangqs");
     var query = new Bmob.Query(GameScore);
     if(skip !=null)
     {
         query.skip(skip);
     }
     else {
         $('.qingshu').find('.content').empty();
     }
     query.limit(20);
     // 查询所有数据
     query.descending("createdAt");
     query.find({
         success: function(results) {
             $("#loading").css('display','none');
             if (results.length == 20) {
                 $('#getmore').css('display','block')
             }else
             {
                 $('#getmore').css('display','none')
             }
             for (var i = 0; i < results.length; i++) {
                 var object = results[i];
                 var content = object.get('content');
                 var title = object.get('title');
                 var name = object.get("username");
                 var avatar = object.get("avatar");
                 var count = object.get("count");
                 var type = object.get('type');
                 var time = object.createdAt;
                 var id = object.id;
                // console.log(object.id + ' - ' + object.get('content'));
                $('.qingshu').find('.content').append("<div class='qsitem'> <div class='qscontent'>"+
                 "<div class='qscontent1'> <div>"+content+"</div><div class='tyle'><span class='biaoqian'>标签：</span><span class='typestyle'>"+type+
                 "</span></div> </div>"+
                 "<span class='qstitle'>"+title+"</span>"+
                 "<span class='qstime'>"+time+"</span>"+
                 "</div>"+
                 "<div class='qsavatar'>"+"<img class='qsavatarimg' src="+avatar+"> </img> </div>"+
                 "<div class='heart' rel='like' id="+id+">"+count+"</div>" +
                 "</div>");

                  // var id = $(this).attr("id");
                  setTimeout(function(){
                      var like = JSON.parse(localStorage.getItem("like"));
                      var unlike = JSON.parse(localStorage.getItem("unlike"));
                      for (var i = 0; i < like.length; i++) {
                          var index = $.inArray(like[i],unlike)
                         //var count = parseInt($('#'+unlike[index]).html());
                         //$('#'+unlike[index]).html(count+1);
                         $('#'+unlike[index]).addClass("heartAnimation");
                      }
                  },1000)
             }
         }
     });
 }

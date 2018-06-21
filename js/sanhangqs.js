$(document).ready(function(){
  var height = $(window).height();
  $(document.body).css('height',height);

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
});

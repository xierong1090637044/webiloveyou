$(document).ready(function(){

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
     // var id = $(this).attr("id");
     setTimeout(function(){
         var like = JSON.parse(localStorage.getItem("like"));
         var unlike = JSON.parse(localStorage.getItem("unlike"));
         for (var i = 0; i < like.length; i++) {
             var index = $.inArray(like[i],unlike)
             console.log(index);
             console.log(like[index]);
            var count = parseInt($('#'+unlike[index]).html());
            $('#'+unlike[index]).html(count+1);
            $('#'+unlike[index]).addClass("heartAnimation");
         }
         console.log(unlike);
     },1000)
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

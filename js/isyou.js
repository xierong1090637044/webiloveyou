 $(document).ready(function()
     {
         Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");
         var height = $(window).height();
         var width = $(window).width();
         //$(document.body).css('height',height);
         $(".mobilecontent").css('width',width);
         $(".usercontent").css('padding-top',0.05*height+5);
         //$(".usercontent").css('padding-bottom',0.1*height+5);
         $(".iybacgroundimg").css("left",width/2-95);
         $(".iybacgroundtext").css("left",width/2-95);

         $('#loading').css('display','flex');

         //示例图片的展示功能
         var state = localStorage["state"];
         if(state ==0)
         {
             $('#iycontent').css("display","block");
             $('#mask').css("display","block");
         }

         $('#confrim').click(function(){
             $('#iycontent').css("display","none");
             $('#mask').css("display","none");

             localStorage["state"] =1;
         });

         //查询isyou数据表获取数据
         var IsYou = Bmob.Object.extend("isyou");
         var query = new Bmob.Query(IsYou);
         query.limit(10);
         query.descending("createdAt");
         // 查询所有数据
         query.find({
             success: function(results) {
                 for (var i = 0; i < results.length; i++) {
                     var object = results[i];
                     var src = object.get('imgurl');
                     var name = object.get('mastername');
                     var avatar= object.get('masteravatar');
                     var content = object.get('content');
                     var id = object.id
                    // alert(object.id + ' - ' + object.get('playerName'));
                    $(".usercontent").append("<div class='single'><img class='iyimgstyle' src="+src+" id="+id+"></img><div class='iycontentbmob'><div>"
                    +content+"</div><div class='nickname'>"+name+
                    "</div><img class='iyavatar' src="+avatar+"></img></div></div>")
                 }
                 $('#loading').css('display','none');
             },
         });

         $('body').on("click",'.single',function()
         {
             var img = $(this).find(".iyimgstyle");
             var content = $(this).find(".iycontentbmob");

             if(img.hasClass("animation") && content.hasClass("contentanimation"))
             {
                 img.addClass("animation1").removeClass("animation").removeClass("index");
                 content.addClass("contentanimation1").removeClass("contentanimation").removeClass("index1");
             }else {
                 img.addClass("animation").addClass("index").removeClass("animation1");
                 content.addClass("contentanimation").addClass("index1").removeClass("contentanimation1");
             }
         });

         /*$('#next').click(function(){
            x+=1;
            var index = 10*x;
            //查询isyou数据表获取数据
            query1(index);
        });*/

         function getScrollTop(){
             var scrollTop = 0, bodyScrollTop = 0, documentScrollTop = 0;
             if(document.body){
                 bodyScrollTop = document.body.scrollTop;
             }
             if(document.documentElement){
                 documentScrollTop = document.documentElement.scrollTop;
             }
             scrollTop = (bodyScrollTop - documentScrollTop > 0) ? bodyScrollTop : documentScrollTop;
             return scrollTop;
         }
         //文档的总高度
         function getScrollHeight(){
             var scrollHeight = 0, bodyScrollHeight = 0, documentScrollHeight = 0;
             if(document.body){
                 bodyScrollHeight = document.body.scrollHeight;
             }
             if(document.documentElement){
                 documentScrollHeight = document.documentElement.scrollHeight;
             }
             scrollHeight = (bodyScrollHeight - documentScrollHeight > 0) ? bodyScrollHeight : documentScrollHeight;
             return scrollHeight;
         }

         function getWindowHeight(){
             var windowHeight = 0;
             if(document.compatMode == "CSS1Compat"){
                 windowHeight = document.documentElement.clientHeight;
             }else{
                 windowHeight = document.body.clientHeight;
             }
             return windowHeight;
         }

         var x=0;
         window.onscroll = function(){
             if(getScrollTop() + getWindowHeight() == getScrollHeight()){
                 x+=1;
                 var number = x*10;
                query1(number,"no");
             }
         };
     })

     function query1(data,empty=null){
         var IsYou = Bmob.Object.extend("isyou");
         var query = new Bmob.Query(IsYou);
         query.skip(data);
         query.limit(10);
         query.descending("createdAt");
         // 查询所有数据
         query.find({
             success: function(results) {
                 if(results.length ==0)
                 {
                     $('#toast4').css("display","block");
                     setTimeout(function(){
                         $('#toast4').css("display","none");
                     },2000)
                 }
                 else {
                     if(empty =="no")
                     {
                     }else {
                         $(".usercontent").empty();
                     }

                     for (var i = 0; i < results.length; i++) {
                         var object = results[i];
                         var src = object.get('imgurl');
                         var name = object.get('mastername');
                         var avatar= object.get('masteravatar');
                         var content = object.get('content');
                         var id = object.id
                        // alert(object.id + ' - ' + object.get('playerName'));
                        $(".usercontent").append("<div class='single'><img class='iyimgstyle' src="+src+" id="+id+"></img><div class='iycontentbmob'><div>"
                        +content+"</div><div class='nickname'>"+name+
                        "</div><img class='iyavatar' src="+avatar+"></img></div></div>")
                     }
                 }
             },
         });
     }

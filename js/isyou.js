 $(document).ready(function()
     {
         var height = $(window).height();
         var width = $(window).width();
         $(document.body).css('height',height);
         $(".iybacgroundimg").css("left",width/2-95);
         $(".iybacgroundtext").css("left",width/2-95);

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
         })
     })

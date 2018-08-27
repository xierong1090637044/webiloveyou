$(document).ready(function(){
    Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");
    var height = $(window).height();
    var kdname ="shunfeng";

    $('#dropdownMenuButton').dropdown();
    $('#kdcompany').dropdown();

    $('#item').click(function(){
        $('#dropdownMenuButton').html($('#item').html());
        $('#content').css("display",'block');
        $('#content1').css("display",'none');
    });

    $('#item1').click(function(){
        $('#dropdownMenuButton').html($('#item1').html());
        $('#content').css("display",'none');
        $('#content1').css("display",'block');
    });

    $('.dropdown-item1').bind('click', function()
    {
       var index = $(this).data('idx');
       var text = $(this).html();
       kdname = index;
       $('#kdcompany').html(text);
    });

    function formatterDateTime() {
        var date=new Date()
        var month=date.getMonth() + 1
        var datetime = date.getFullYear()+ ""+ (month >= 10 ? month : "0"+ month)+ ""
        + (date.getDate() < 10 ? "0" + date.getDate() : date.getDate())+ ""+ (date.getHours() < 10 ? "0" + date.getHours() : date.getHours())+ ""
                + (date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes())+ ""
                + (date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds());
        return datetime;
    }

    $('#getdetail').click(function()
    {
        var value = $('#input').val();
        $('#listitem').empty();
        $("#companyname").html();
        $("#companyname").css("display","none");
        if(value.length<10)
        {
            toast("单号不正确");
        }else {
        $.ajax({
            type: 'post',
            url: 'http://route.showapi.com/64-19',
            dataType: 'json',
            data: {
                "showapi_timestamp": formatterDateTime(),
                "showapi_appid": '73509', //这里需要改成自己的appid
                "showapi_sign": '20afc70e4549427989f8e57627e14d83',  //这里需要改成自己的应用的密钥secret
                "com":kdname,
                "nu":value,
            },

            error: function(XmlHttpRequest, textStatus, errorThrown) {
                toast("查询失败")
            },
            success: function(result) {
                var companyname = result.showapi_res_body.expTextName;
                var msg = result.showapi_res_body.msg;
                var data = result.showapi_res_body.data;
                toast(msg);

                $("#companyname").html(companyname);
                $("#companyname").css("display","block");

                for(var i =0;i<=data.length-1;i++)
                {
                    $("#listitem").prepend("<div class = 'lisetitem'><div class = 'listtext'>"+data[i].context+
                    "</div><div class='listtime'>"+data[i].time+"</div></div>")
                }
            }
        });
       }
   });

   function toast(text)
   {
       $('#toast').css("visibility","visible");
       $('#toast').html(text);
       setTimeout(function(){
           $('#toast').css("visibility","hidden");
           $('#toast').html("");
       },1000)
   }

})

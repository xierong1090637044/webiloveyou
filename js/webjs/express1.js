$(document).ready(function(){
    Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");
    var height = $(window).height();
    var kdname ="shunfeng";
    var userid = getCookie("objectId");

    $('#dropdownMenuButton').dropdown();
    $('#kdcompany').dropdown();

    $('#item').click(function(){
        $('#dropdownMenuButton').html($('#item').html());
        $('#content').css("display",'block');
        $('#content1').css("display",'none');
        $('#content2').css("display",'none');
    });

    //我要寄件点击
    $('#item1').click(function(){
        var GameScore = Bmob.Object.extend("express");
        var query = new Bmob.Query(GameScore);
        query.equalTo("parent", userid);
        query.find({
            success: function(results) {
                if(results.length == 0)
                {
                    $('#dropdownMenuButton').html($('#item1').html());
                    $('#content').css("display",'none');
                    $('#content1').css("display",'block');
                }else {
                    $('#content2').empty();
                    $('#dropdownMenuButton').html($('#item1').html());
                    $('#content').css("display",'none');
                    $('#content2').css("display",'block');
                    for (var i = 0; i < results.length; i++) {
                        var object = results[i];
                        var itemid = object.id;
                        var username = object.get("username");
                        var userphone = object.get("userphone");
                        var useraddress = object.get("useraddress");
                        var postname = object.get("postname");
                        var postphone = object.get("postphone");
                        var postaddress = object.get("postaddress");
                        var notice = object.get("notice");
                        var state = object.get("state");

                        $('#content2').append("<div class ='orderlist'><div class='orderitem'><div class='liststyle'>联系人</div><div class='liststyle1'>"+username+
                        "</div></div><div class='orderitem'><div class='liststyle'>联系方式</div><div class='liststyle1'>"+userphone+
                        "</div></div><div class='orderitem'><div class='liststyle'>取件地址</div><div class='liststyle1'>"+useraddress+
                        "</div></div><div class='orderitem'><div class='liststyle'>收件人</div><div class='liststyle1'>"+postname+
                        "</div></div><div class='orderitem'><div class='liststyle'>收件人电话</div><div class='liststyle1'>"+postphone+
                        "</div></div><div class='orderitem'><div class='liststyle'>收件人地址</div><div class='liststyle1'>"+postaddress+
                        "</div></div><div class='orderitem'><div class='liststyle'>备注</div><div class='liststyle1'>"+notice+
                        "</div></div><div class='state'>"+state+
                        "</div>");

                        if(state=="等待取件") $('#giveup').css("visibility","visible");

                        $('#delete').click(function(){
                            var GameScore = Bmob.Object.extend("express");
                            var query = new Bmob.Query(GameScore);
                            query.get(itemid, {
                                success: function(object) {
                                    object.destroy({
                                        success: function(deleteObject) {
                                            toast("取消成功");
                                            $('#content2').empty();
                                            $('#content').css("display",'none');
                                            $('#content2').css("display",'none');
                                            $('#content1').css("display",'block');
                                            $('#giveup').css("visibility","hidden");
                                        },
                                    });
                                 },
                             });
                        });
                    }
                }
            },
        });
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

   //提交按钮功能
   $('#submit').click(function(){
       var value1 = $('#input1').val();
       var value2 = $('#input2').val();
       var value3 = $('#input3').val();
       var value4 = $('#input4').val();
       var value5 = $('#input5').val();
       var value6 = $('#input6').val();
       var value7 = $('#input7').val();

       if(value1 =="" || value2=="" ||value3=="" ||value4=="" || value5=="" ||value6=="")
       {
           toast("请填写完整");
       }
       else if (value2.length <11 || value5.length <11) {
           toast("手机号码不正确");
       }else {
           var GameScore = Bmob.Object.extend("express");
           var User = Bmob.Object.extend("_User");
           var gameScore = new GameScore();
           var user = new User();
           user.id = userid;
           gameScore.set("username", value1);
           gameScore.set("userphone", value2);
           gameScore.set("useraddress", value3);
           gameScore.set("postname", value4);
           gameScore.set("postphone", value5);
           gameScore.set("postaddress", value6);
           if(value7 == ""){
               gameScore.set("notice", "未填写");
           }else {
               gameScore.set("notice", value7);
           }
           gameScore.set("state", "等待取件");
           gameScore.set("parent", user);
           gameScore.save(null, {
               success: function(gameScore) {
                   var objectId = gameScore.id;
                   toast("提交成功");
                   var GameScore = Bmob.Object.extend("express");
                   var query = new Bmob.Query(GameScore);
                   query.get(objectId, {
                       success: function(gameScore) {
                           $('#content1').css("display","none");
                           $('#content2').css("display","block");
                           var username = gameScore.get("username");
                           var userphone = gameScore.get("userphone");
                           var useraddress = gameScore.get("useraddress");
                           var postname = gameScore.get("postname");
                           var postphone = gameScore.get("postphone");
                           var postaddress = gameScore.get("postaddress");
                           var notice = gameScore.get("notice");
                           var state = gameScore.get("state");

                           $('#content2').append("<div class ='orderlist'><div class='orderitem'><div class='liststyle'>联系人</div><div class='liststyle1'>"+username+
                           "</div></div><div class='orderitem'><div class='liststyle'>联系方式</div><div class='liststyle1'>"+userphone+
                           "</div></div><div class='orderitem'><div class='liststyle'>取件地址</div><div class='liststyle1'>"+useraddress+
                           "</div></div><div class='orderitem'><div class='liststyle'>收件人</div><div class='liststyle1'>"+postname+
                           "</div></div><div class='orderitem'><div class='liststyle'>收件人电话</div><div class='liststyle1'>"+postphone+
                           "</div></div><div class='orderitem'><div class='liststyle'>收件人地址</div><div class='liststyle1'>"+postaddress+
                           "</div></div><div class='orderitem'><div class='liststyle'>备注</div><div class='liststyle1'>"+notice+
                           "</div></div><div class='state'>"+state+
                           "</div>");

                           $('#giveup').css("visibility","visible");

                           $('#delete').click(function(){
                               var GameScore = Bmob.Object.extend("express");
                               var query = new Bmob.Query(GameScore);
                               query.get(objectId, {
                                   success: function(object) {
                                       object.destroy({
                                           success: function(deleteObject) {
                                               toast("取消成功");
                                               $('#content2').empty();
                                               $('#content').css("display",'none');
                                               $('#content2').css("display",'none');
                                               $('#content1').css("display",'block');
                                               $('#giveup').css("visibility","hidden");
                                           },
                                       });
                                    },
                                });
                           });
                       },
                   });
               },
           });
       }
   })

   function toast(text)
   {
       $('#toast').css("visibility","visible");
       $('#toast').html(text);
       setTimeout(function(){
           $('#toast').css("visibility","hidden");
           $('#toast').html("");
       },1000)
   }

   function getCookie(c_name) {
       if(document.cookie.length > 0) {
           c_start = document.cookie.indexOf(c_name + "=");//获取字符串的起点
           if(c_start != -1) {
               c_start = c_start + c_name.length + 1;//获取值的起点
               c_end = document.cookie.indexOf(";", c_start);//获取结尾处
               if(c_end == -1) c_end = document.cookie.length;//如果是最后一个，结尾就是cookie字符串的结尾
               return decodeURI(document.cookie.substring(c_start, c_end));//截取字符串返回
           }
       }
       return "";
   }
})

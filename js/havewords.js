$(document).ready(function()
{
    Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");
    var height = $(window).height()*0.9;

    $('.mobilecontent').css('height',height);
    $("#loading").css('display',"flex");

    var GameScore = Bmob.Object.extend("bbq");
    var query = new Bmob.Query(GameScore);
    // 查询所有数据
    query.find({
        success: function(results) {
            // 循环处理查询到的数据
            for (var i = 0; i < results.length; i++) {
                var object = results[i];
                var mastername = object.get('mastername');
                var masteravatar = object.get('masteravatar');
                var tellobject = object.get('tellobject');
                var bgimg = object.get('bgimg');
                var comment = object.get('comment');
                var time = object.createdAt;
                //alert(object.id + ' - ' + object.get('playerName'));
                $('.bbqdetails').append("<div class='bbqdetails-item' id="+object.id+"><div class='frist-item'><div class='bbq-tellobject'> 告白对象："+tellobject+
                "</div><div class='bbq-createdAt'>"+time+
                "</div></div><img class='bbq-bgimg' src="+bgimg+"></img> <div class='bbq-masterinfo'><img class='masteravatar' src="+masteravatar+
                "> </img> <div class='mastername'>"+mastername+
                "</div> <div class='bbq-comment'><svg class='icon1' aria-hidden='true'><use xlink:href='#icon-liuyanzhi'></use></svg> <span class='bbq-coomment1'>"
                +comment+
                "</span> </div> </div> </div>");
                $("#loading").css('display',"none");
            }
        }
    });


})

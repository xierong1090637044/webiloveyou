$(document).ready(function()
{
    Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");
    var height = $(window).height();

    $('.mobilecontent').css('height',height);
    $("#loading").css('display',"flex");

    append("null");

    setTimeout(function(){
        $('#setting-item').animate({right:"-5.5%"})
    },1000);

    var x=0;
    $('#setting').click(function(){
        x+=1;
        var index = x%2;
        if(index == 1)
        {
            $('#setting-item').animate({right:"2%"},"fast",function(){
                $('#setting1').css('display','block');
                $('#setting2').css('display','block');
                setTimeout(function(){
                    x=0
                    $('#setting-item').animate({right:"-5.5%"});
                    $('#setting1').css('display','none');
                    $('#setting2').css('display','none');
                },5000);
            })
        }
        else {
            $('#setting-item').animate({right:"-5.5%"},"fast",function(){
                $('#setting1').css('display','none');
                $('#setting2').css('display','none');
            })
        }
    });

    $('#setting2').click(function(){
        $('#mask').css('display','block');
        $('#input-ele').css('display','block');
    });

    $('#mask').click(function(){
        $('#mask').css('display','none');
        $('#input-ele').css('display','none');
    });

    $('#sousuo-button').click(function(){
        var inputval = $('.inputstyle').val();
        if(inputval =="")
        {
            $('#toast3').css('display','block');
            setTimeout(function(){
                $('#toast3').css('display','none');
            },2000)
        }else {
            append(inputval);
        }
    });

    $('body').on("click",'.bbqdetails-item',function()
    {
        var id = $(this).attr('id');
        window.location.href="bbqdetails.php?objectid="+id;
        console.log(id);
    });

})

function append(querycontent)
{

    if(querycontent !== "null")
    {
        console.log(querycontent);
        //var GameScore = Bmob.Object.extend("bbq");
        //var query = new Bmob.Query(GameScore);
        //query.equalTo("tellobject", querycontent);
        var GameScore = Bmob.Object.extend("bbq");
        var query1 = new Bmob.Query(GameScore);
        query1.equalTo("mastername", querycontent);
        var query2 = new Bmob.Query(GameScore);
        query2.equalTo("tellobject", querycontent);
        var query = Bmob.Query.or(query1, query2);
    }else {
        var GameScore = Bmob.Object.extend("bbq");
        var query = new Bmob.Query(GameScore);
        query.descending("comment");
        query.limit(15);
    }
    // 查询所有数据
    query.find({
        success: function(results) {
            // 循环处理查询到的数据
            if(results.length ==0)
            {
                $('#toast5').css('display','block');
                setTimeout(function(){
                    $('#toast5').css('display','none');
                    $('#mask').css('display','none');
                    $('#input-ele').css('display','none');
                },1500);
            }else {
                $('.bbqdetails').empty();
                for (var i = 0; i < results.length; i++) {
                    if(querycontent !="null")
                    {
                        $('#toast4').css('display','block');
                        setTimeout(function(){
                            $('#toast4').css('display','none');
                            $('#mask').css('display','none');
                            $('#input-ele').css('display','none');
                        },1500);
                    }
                    var object = results[i];
                    var mastername = object.get('mastername');
                    var masteravatar = object.get('masteravatar');
                    var tellobject = object.get('tellobject');
                    var bgimg = object.get('bgimg');
                    var comment = object.get('comment');
                    var time = object.createdAt;
                    //alert(object.id + ' - ' + object.get('playerName'));
                    $('.bbqdetails').append("<div class='bbqdetails-item' id="+object.id+"><div class='frist-item'><div class='bbq-tellobject'><span> 告白对象：</span><span class='bbq-tellobject1'>"+tellobject+
                    "</span></div><div class='bbq-createdAt'>"+time+
                    "</div></div><img class='bbq-bgimg' src="+bgimg+"></img> <div class='bbq-masterinfo'><img class='masteravatar' src="+masteravatar+
                    "> </img> <div class='mastername'>"+mastername+
                    "</div> <div class='bbq-comment'><svg class='icon1' aria-hidden='true'><use xlink:href='#icon-liuyanzhi'></use></svg> <span class='bbq-coomment1'>"
                    +comment+
                    "</span> </div> </div> </div>");
                    $("#loading").css('display',"none");

                }
            }

        }
    });
}

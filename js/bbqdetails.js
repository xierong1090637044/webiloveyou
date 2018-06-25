$(document).ready(function(){
    Bmob.initialize("873b0fd8dbe9e8ff02d9923fe9698bb0", "cbca9557a637b9e82093720dbcfddabf");
    var height = $(window).height();
    $('.MobContent').css('height',height);
    $('#loading').css('display','flex');

    var objectid = GetRequest("objectid");
    var id = objectid.objectid;
    query(id);

    $('#addcomment').click(function(){
        $('#mask').css('display','block');
        $('#edit').css('display','block');
    });

    $('#mask').click(function(){
        $('#mask').css('display','none');
        $('#edit').css('display','none');
    });




    $('#submit').click(function(){
        var cjcontent = $('#cjcontent').val();
        var comment =JSON.parse(localStorage["comment"]);
        if(cjcontent.length<15)
        {
            $('#toast').css('display','block');
            setTimeout(function(){
                $('#toast').css('display','none');
            },1500);
        }else {
            var username = localStorage['username'];
            var useravater = localStorage['avatar'];

            var GameScore = Bmob.Object.extend("bbqdetails");
            var User = Bmob.Object.extend("_User");
            var Bbq = Bmob.Object.extend("bbq");
            var gameScore = new GameScore();
            var bbq = new Bbq();
            var user = new User();
            user.id = localStorage["objectid"];
            bbq.id = id;
            gameScore.set("tellcontent",  cjcontent);
            gameScore.set("username", username);
            gameScore.set("useravater", useravater);
            gameScore.set("masterbbq", id);
            gameScore.set("parent", user);
            gameScore.set("parent1", bbq);
            gameScore.save(null, {
                 success: function(object) {
                     $('.comment').empty();
                     $('#loading').css('display','flex');
                     query(id);

                     var GameScore = Bmob.Object.extend("bbq");
                     var query1 = new Bmob.Query(GameScore);
                     query1.get(id, {
                         success: function(gameScore) {
                             // 回调中可以取得这个 GameScore 对象的一个实例，然后就可以修改它了
                             gameScore.set('comment',comment + 1);
                             gameScore.save();
                             $('#toast1').css('display','block');
                             setTimeout(function(){
                                 $('#toast1').css('display','none');
                                 $('#mask').css('display','none');
                                 $('#edit').css('display','none');
                                 query(id);
                             },1000);
                         }
                     });
                 },
             });
        }
    });

})

function query(objectid)
{
    var id = objectid;
    var GameScore = Bmob.Object.extend("bbqdetails");
    var gamescore = new GameScore();
    var query = new Bmob.Query(GameScore);
    query.equalTo("parent1", id);
    query.include("parent1");
    query.find({
    success: function(results) {
        var bbq = results[0].get('parent1');
        var bgimg = bbq.get('bgimg');
        var tellobject = bbq.get('tellobject');
        var mastername = bbq.get('mastername');
        var masteravatar = bbq.get('masteravatar');
        var time = bbq.createdAt;
        var comment = bbq.get('comment');
        console.log(comment);
        localStorage["comment"] = comment;
        $('#bgimg').attr('src',bgimg);
        $('#tellobject').html(tellobject);
        $('#mastername').html(mastername);
        $('.masteravatar').attr('src',masteravatar);
        $('.creater-at').html(time);

        $('#loading').css('display','none');
        for (var i = 0; i < results.length; i++) {
        var object = results[i];
        var comment = object.get('tellcontent');
        var username = object.get('username');
        var avatar = object.get('useravater');
        var time = object.createdAt;

        $('.comment').append('<div class="comment-item"><div class="comment-content">'+comment+'</div><div class="comment-user"><div class="comment-ime">'
        +time+'</div><div class="comment-username">'+username+
        '</div><img class="comment-avatar" src='+avatar+
        '></img></div></div>')
        }
    }
});
};

function GetRequest() {
    var url = location.search; //获取url中"?"符后的字串
    var theRequest = new Object();
    if (url.indexOf("?") != -1) {
        var str = url.substr(1);
        strs = str.split("&");
        for(var i = 0; i < strs.length; i ++) {
             theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);
         }
     }
     return theRequest;
 }

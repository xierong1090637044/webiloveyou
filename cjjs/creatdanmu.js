// 数据初始化 弹幕功能的添
var GameScore = Bmob.Object.extend("danmulist");
var query = new Bmob.Query(GameScore);
var data = [];
// 查询所有数据
query.find({
    success: function(results) {
        // 循环处理查询到的数据
        if (results.length>0) {
            for (var i = 0; i < results.length; i++) {
                var object = results[i];
                data[i] = object.get('danmu');
            }
             var Obj = $('body').barrage({
                 data : data, //数据列表
                 row : 5,   //显示行数
                 time : 2500, //间隔时间
                 gap : 20,    //每一个的间隙
                 position : 'fixed', //绝对定位
                 direction : 'bottom right', //方向
                 ismoseoverclose : true, //悬浮是否停止
                 height : 30, //设置单个div的高度
             })
             Obj.start();
        }
    },
});

//添加评论
$("#submit_barraget").click(function(){

var val = $("#barrage_content").val();
//此格式与dataa.js的数据格式必须一致
var addVal = {
  href : '',
  text : val
}
var GameScore = Bmob.Object.extend("danmulist");
var gameScore = new GameScore();
gameScore.set("danmu", addVal);
//添加数据，第一个入口参数是null
gameScore.save(null, {
  success: function(gameScore) {
      $('#barrage').remove();
      var GameScore = Bmob.Object.extend("danmulist");
      var query = new Bmob.Query(GameScore);
      query.descending("createdAt");
      var data = [];
      // 查询所有数据
      query.find({
          success: function(results) {
              for (var i = 0; i < results.length; i++) {
                  var object = results[i];
                  data[i] = object.get('danmu');
              }
              var Obj1 = $('body').barrage({
                  data : data, //数据列表
                  row : 5,   //显示行数
                  time : 2500, //间隔时间
                  gap : 20,    //每一个的间隙
                  position : 'fixed', //绝对定位
                  direction : 'bottom right', //方向
                  ismoseoverclose : true, //悬浮是否停止
                  height : 30, //设置单个div的高度
              })
              Obj1.start();
              $("#barrage_content").val("")
          },
      });
  }
});
//Obj.data.unshift(addVal);
})

$("#open").click(function(){
$('#barrage').css('display','block');
})
$("#stop").click(function(){
$('#barrage').css('display','none');
})

 $(document).ready(function(){
var state = 1;

$('#sky').click(function(){

        $('#mask').css('display','block');
        $('#qrcode').css('display','block');
})

$('#qrcreate').click(function(){
    var textcontent = $('.qrcodetextarea').val();
    console.log(textcontent);
    if(state)
    {
        if(textcontent =="")
        {
            $('#toast').css('display','block');
            setTimeout(function() {
                $('#toast').css('display','none');
            },1000)
        }else {
            $.ajax({
                type: 'post',
                url: 'http://route.showapi.com/887-1',
                dataType: 'json',
                data: {
                    "showapi_timestamp": formatterDateTime(),
                    "showapi_appid": '66939', //这里需要改成自己的appid
                    "showapi_sign": '8741e2d8bba64bed81f7a27dacd63189',  //这里需要改成自己的应用的密钥secret
                    "content":textcontent,
                    "size":"5",
                    "imgExtName":"jpg"
                },
                success: function(result) {
                    state =0;
                    var imgurl = result.showapi_res_body.imgUrl;
                    $('.qrcodetextarea').css('display','none');
                    $('#qrimg').attr('src',imgurl);
                    $('#qrcreate').html('重新生成');
                    $('#notice').css('display','block');
                }});
            }
    }else {
        state=1;
        $('.qrcodetextarea').css('display','block');
        $('#qrimg').attr('src','');
        $('#notice').css('display','none');
        $('#qrcreate').html('生成二维码');
    }

})

function formatterDateTime() {
  var date=new Date()
  var month=date.getMonth() + 1
        var datetime = date.getFullYear()
                + ""// "年"
                + (month >= 10 ? month : "0"+ month)
                + ""// "月"
                + (date.getDate() < 10 ? "0" + date.getDate() : date
                        .getDate())
                + ""
                + (date.getHours() < 10 ? "0" + date.getHours() : date
                        .getHours())
                + ""
                + (date.getMinutes() < 10 ? "0" + date.getMinutes() : date
                        .getMinutes())
                + ""
                + (date.getSeconds() < 10 ? "0" + date.getSeconds() : date
                        .getSeconds());
        return datetime;
    }

})

// 把要操作的对象先获取到
var banner = $('.banner');
var Left = $('.left'); // alert(Left.length);
var Right = $('.right');
var Ul = $('ul'); // alert(Ul.length);
var Width = $('ul li').width(); //alert(Width);
var Point = $('.banner ol li'); // alert(Point.length);
var Index = 0; //用于记录点击的次数，图片的张数(计数器，记录了图片移动的张数)

//点击小圆点让图片移动
$.each(Point, function(index, value) { //如果此处我没有用each循环来写，那么我便需要用$(this).index()方法来获取图片的下标
    //让点击的小圆点有class样式，其他li没有class样式
    Point.eq(index).on('click', function() {
        $(this).addClass('now').siblings().removeClass('now');
        Ul.stop().animate({
            'left': -index * Width
        });
        Index = index;
        console.log(Index);
        //alert(Index);
    })
});

//	点击右箭头,ul往左跑
Right.on('click', function() {
    //需要做一个判断，如果发现此时图片是最后一张图片，就不能继续执行了
    //让index是图片的张数减一的时候,让index不继续加
    if (Index >= 6) {
        //让index变成0
        Index = 0;
        //              	让ul的left值瞬间变成0
        Ul.css('left', 0);
    }
    Index++;
    Ul.stop().animate({
        'left': -Index * Width
    });

    if (Index == 6) {
        //因为在图片最后面添加了一张假图片，其实最后一张图片的时候，需要对应的是索引0的小圆点
        Point.eq(0).addClass('now').siblings().removeClass('now');

    } else {
        Point.eq(Index).addClass('now').siblings().removeClass('now');
    }

})

//点击左箭头,让Ul往右跑
Left.on('click', function() {
    if (Index <= 0) {
        //return; 此时不应该return,应该让index变成最大的值，left也变成最大的left
        Index = 6;
        Ul.css('left', -Index * Width);
    }
    Index--;
    Ul.stop().animate({
        'left': -Index * Width
    });

    if (Index == 6) {
        //因为在图片最后面添加了一张假图片，其实最后一张图片的时候，需要对应的是索引0的小圆点
        Point.eq(0).addClass('now').siblings().removeClass('now');
    } else {
        Point.eq(Index).addClass('now').siblings().removeClass('now');
    }

})



//调取Right方法，使其自动播放
var time = setInterval(function() {
    Right.click();
}, 2000);

//鼠标移到banner中,自动播放停止
banner.mouseenter(function() {
    clearInterval(time);
});

// 鼠标移出banner中,自动播放开始
banner.mouseleave(function() {
    time = setInterval(function() {
        Right.click();
    }, 2000);
})

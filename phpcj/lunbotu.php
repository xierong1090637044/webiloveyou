<?php
class Lunbotu
{
    public function __construct($imgs)
    {
        $this->imgs= $imgs;
    }

    public function lunbotu()
    {
        echo '<div class="banner"><ul>';
        echo '<li><img src="http://www.jq22.com/img/cs/500x300-1.png"></li>
        <li><img src="http://www.jq22.com/img/cs/500x300-2.png"></li>
        <li><img src="http://www.jq22.com/img/cs/500x300-3.png"></li>
        <li><img src="http://www.jq22.com/img/cs/500x300-4.png"></li>
        <li><img src="http://www.jq22.com/img/cs/500x300-5.png"></li>
        <li><img src="http://www.jq22.com/img/cs/500x300-6.png"></li>
        <!--在轮播图的最后面加上一张假的图片，就是第一张。目的，最后一张换成第一张的时候，用户察觉不到-->
        <li><img src="http://www.jq22.com/img/cs/500x300-7.png"></li>
    </ul>
    <div class="arrow">
        <span class="left">&lt;</span>
        <span class="right">&gt;</span>
    </div>
    <!--存放小圆点的图片-->
    <ol>
        <li class="now"></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ol>
</div>';
    }
    private $imgs;
}

?>

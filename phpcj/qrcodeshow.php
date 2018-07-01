<?php
class Qrcode
{
    public function __construct($id='qrcode')
    {
        $this->id= $id;
    }

    public function qrcode()
    {
        echo '<div id=';echo $this->id;echo ' class="qrcodeItem">';
        echo '<img class="qqhimg" src="../images/qqh.png"></img>';
        echo '<div><img class="qrimg" id="qrimg"></img></div>';
        echo '<textarea maxlength="100" class="qrcodetextarea"></textarea>';
        echo '<div class="qrcreate" id="qrcreate">生成二维码</div>';
        echo '<div class="notice" id="notice">长按可以保存发送给朋友哦</div>';
        echo '</div>';
    }
    private $id;
}

?>

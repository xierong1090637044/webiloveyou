<?php
class create
{

    public function __construct($id=null)
    {
        $this->id = $id;
    }

    public function Create()
    {
        echo
        '
                <div class ="mask" id="mask"></div>
        		<div id="edit" class="maincontent">
                  
                   <img src="../images/sanhangqs.png" class="sanhangqstitle" />
                   <div class="form">
                     <div style="margin-top:5px;margin-bottom:13px;"><input type="text" id="biaoti" placeholder="姓名" class="title" maxlength=8></div>
                     <div style="margin-top:5px;margin-bottom:13px;"><textarea placeholder="内容" maxlength="150" class="textarea" id="cjcontent" wrap="hard"></textarea></div>
                     <div style="margin-bottom:10px;"><input type="submit" value="提交" class="submit" id="submit"></div>
                   </div>
                </div>
        ';
    }

    private $id;
}

?>

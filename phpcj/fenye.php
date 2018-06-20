<?php
class fenye
{

    public function __construct($id=null,$number)
    {
        $this->id = $id;
    }

    public function fenye()
    {
        echo
        '
                <div class ="mask" id="mask"></div>
        		<div id="edit" class="maincontent">
                   <div style ="padding:4px;font-size:15px">三行情书</div>
                   <div class="form">
                     <div style="margin-top:5px;margin-bottom:13px;"><input type="text" id="biaoti" placeholder="姓名" class="title"></div>
                     <div style="margin-top:5px;margin-bottom:13px;"><textarea placeholder="内容" maxlength="150" class="textarea" id="content"></textarea></div>
                     <div style="margin-bottom:10px;"><input type="submit" value="提交" class="submit" id="submit"></div>
                   </div>
                </div>
        ';
    }

    private $id;
}

?>

<?php
class Inputwithicon
{
    public function __construct($addclass=null)
    {
        $this->addclass = $addclass;
    }

    public function input()
    {
        echo '
        <div class="inputelement '; echo $this->addclass;echo '" id ="input-ele">
          <svg class="input-icon" aria-hidden="true"><use xlink:href="#icon-sousuo2"></use></svg>
          <input  placeholder="输入表白墙的名字" class="inputstyle" maxlength="10" input type="text"/>
          <button class="sousuo-button" id="sousuo-button">搜索</button>
        </div>


        ';
    }
    private $addclass;

}

?>

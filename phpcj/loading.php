<?php
class Loading
{
    public function __construct($addclass=null)
    {
        $this->addclass = $addclass;
    }

    public function loading()
    {
        echo '
        <div class="loadingcontainer '; echo $this->addclass;echo '" id ="loading">
        <div class="item-1"></div>
        <div class="item-2"></div>
        <div class="item-3"></div>
        <div class="item-4"></div>
        <div class="item-5"></div>
        </div>
        ';
    }
    private $addclass;

}

?>

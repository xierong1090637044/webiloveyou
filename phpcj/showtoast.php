<?php
class showToast
{
    public function __construct($id,$content,$addclass=null)
    {
        $this->id= $id;
        $this->content = $content;
        $this->addclass = $addclass;
    }

    public function showtoast()
    {
        echo '<div id=';
        echo $this->id;
        echo ' class="toast1 ';
        echo $this->addclass;
        echo '">';
        echo $this->content;
        echo '</div>';
    }
    private $content;
    private $id;
    private $addclass;
}

?>

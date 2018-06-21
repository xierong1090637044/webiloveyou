<?php
class Button
{
    public function __construct($id,$content,$addclass)
    {
        $this->id= $id;
        $this->content = $content;
        $this->addclass = $addclass;
    }

    public function button()
    {
        echo '<div id=';
        echo $this->id;
        echo ' class="button ';
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

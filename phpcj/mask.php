<?php
class Mask
{
    public function __construct($id='mask')
    {
        $this->id= $id;
    }

    public function mask()
    {
        echo '<div id=';
        echo $this->id;
        echo ' class="mask">';
        echo $this->content;
        echo '</div>';
    }
    private $content;
    private $id;
}

?>

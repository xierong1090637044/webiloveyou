<?php
class showToast
{
    public function __construct($id,$content)
    {
        $this->id= $id;
        $this->content = $content;
    }

    public function showtoast()
    {
        echo '<div id=';
        echo $this->id;
        echo ' class="toast1">';
        echo $this->content;
        echo '</div>';
    }
    private $content;
    private $id;
}

?>

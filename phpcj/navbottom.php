<?php


class Bottomnav
{

    public function __construct()
    {

    }

    public function Bottom()
    {
         echo '<div class="navmain">
                  <div class= "item">
                  <svg class="icon" aria-hidden="true">
                      <use xlink:href="#icon-shufa"></use>
                  </svg>
                  <div class="name">三行情书</div>
                  </div>

                  <div class= "item">
                  <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-yuedu"></use>
                    </svg>
                    <div class="name">缘来是你</div>
                  </div>

                  <div class= "item">
                  <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-liuyanmoban"></use>
                    </svg>
                    <div class="name">有话想说</div>
                  </div>

                  <div class= "item">
                  <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-gerenzhongxin"></use>
                    </svg>
                    <div class="name">还未想好</div>
                  </div>
               </div>';
    }
}

?>

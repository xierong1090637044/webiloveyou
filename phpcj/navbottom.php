<?php


class Bottomnav
{

    public function __construct($selectednub=null)
    {
        $this->selectnub = $selectednub;
    }

    public function Bottom()
    {
        switch ($this->selectnub) {
            case '1':
            echo '<div class="navmain" id="navmain" onclick="window.location.href">
                     <div class= "item1">
                     <svg class="icon" aria-hidden="true">
                           <use xlink:href="#icon-gerenzhongxin"></use>
                       </svg>
                       <div class="name">别来无恙</div>
                     </div>

                <a href ="shanhangqs.php">
                     <div class= "item">

                     <svg class="icon" aria-hidden="true">
                         <use xlink:href="#icon-shufa"></use>
                     </svg>
                     <div class="name">三行情书</div>
                     </div>
                 </a>

                 <a href ="isyou.php">
                     <div class= "item">
                     <svg class="icon" aria-hidden="true">
                           <use xlink:href="#icon-yuedu"></use>
                       </svg>
                       <div class="name">缘来是你</div>
                     </div>
                     <a>

                     <div class= "item">
                     <svg class="icon" aria-hidden="true">
                           <use xlink:href="#icon-liuyanmoban"></use>
                       </svg>
                       <div class="name">有话想说</div>
                     </div>
                  </div>
                  ';
                break;
                case '2':
                echo '<div class="navmain">
                         <a href ="index.php">
                         <div class= "item">
                         <svg class="icon" aria-hidden="true">
                               <use xlink:href="#icon-gerenzhongxin"></use>
                           </svg>
                           <div class="name">别来无恙</div>
                         </div>
                         </a>

                         <a href ="shanhangqs.php">
                         <div class= "item1">
                         <svg class="icon" aria-hidden="true">
                             <use xlink:href="#icon-shufa"></use>
                         </svg>
                         <div class="name">三行情书</div>
                         </div>
                         </a>

                         <a href ="isyou.php">
                             <div class= "item">
                             <svg class="icon" aria-hidden="true">
                                   <use xlink:href="#icon-yuedu"></use>
                               </svg>
                               <div class="name">缘来是你</div>
                             </div>
                             <a>

                         <div class= "item">
                         <svg class="icon" aria-hidden="true">
                               <use xlink:href="#icon-liuyanmoban"></use>
                           </svg>
                           <div class="name">有话想说</div>
                         </div>
                      </div>
                      ';
                    break;
                    case '3':
                    echo '<div class="navmain">
                            <a href ="index.php">
                             <div class= "item">
                             <svg class="icon" aria-hidden="true">
                                   <use xlink:href="#icon-gerenzhongxin"></use>
                               </svg>
                               <div class="name">别来无恙</div>
                             </div>
                              </a>

                              <a href ="shanhangqs.php">
                             <div class= "item">
                             <svg class="icon" aria-hidden="true">
                                 <use xlink:href="#icon-shufa"></use>
                             </svg>
                             <div class="name">三行情书</div>
                             </div>
                             </a>

                             <a href ="isyou.php">
                                 <div class= "item1">
                                 <svg class="icon" aria-hidden="true">
                                       <use xlink:href="#icon-yuedu"></use>
                                   </svg>
                                   <div class="name">缘来是你</div>
                                 </div>
                                <a>

                             <div class= "item">
                             <svg class="icon" aria-hidden="true">
                                   <use xlink:href="#icon-liuyanmoban"></use>
                               </svg>
                               <div class="name">有话想说</div>
                             </div>
                          </div>
                          ';
                        break;
                        case '4':
                        echo '<div class="navmain">
                                 <div class= "item">
                                 <a href ="index.php">
                                 <svg class="icon" aria-hidden="true">
                                       <use xlink:href="#icon-gerenzhongxin"></use>
                                   </svg>
                                   <div class="name">别来无恙</div>
                                   </a>
                                 </div>

                                 <a href ="shanhangqs.php">
                                 <div class= "item">
                                 <svg class="icon" aria-hidden="true">
                                     <use xlink:href="#icon-shufa"></use>
                                 </svg>
                                 <div class="name">三行情书</div>
                                 </div>
                                 </a>

                                 <a href ="isyou.php">
                                     <div class= "item">
                                     <svg class="icon" aria-hidden="true">
                                           <use xlink:href="#icon-yuedu"></use>
                                       </svg>
                                       <div class="name">缘来是你</div>
                                     </div>
                                     <a>

                                 <div class= "item1">
                                 <svg class="icon" aria-hidden="true">
                                       <use xlink:href="#icon-liuyanmoban"></use>
                                   </svg>
                                   <div class="name">有话想说</div>
                                 </div>
                              </div>
                              ';
                            break;
        }
    }

    private $selectednub;
}

?>

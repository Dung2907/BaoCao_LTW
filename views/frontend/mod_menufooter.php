<?php
use App\Models\Menu;

$mod_menufooter=Menu::where([['position','=','footermenu'],['status','=',1]])
->orderBy('sort_order','ASC')
->get();
?>
<h3 class="widgettilte">
                  <strong>Liên hệ</strong>
               </h3>
               <ul class="footer-menu">
                  <?php foreach($mod_menufooter as $rowfm):?>
                  <li><a href="<?=$rowfm->link;?>"><?php echo $rowfm->name;?></a></li>
                  <?php endforeach;?>
                 
               </ul>
<?php

use App\Models\Menu;

$mod_menumainmenu = Menu::where([['position', '=', 'mainmenu'], ['parent_id', '=', 0], ['status', '=', 1]])
   ->orderBy('sort_order', 'ASC')
   ->get();
?>
<nav class="navbar navbar-expand-lg bg-main">
   <div class="container-fluid">
      <a class="navbar-brand d-block d-sm-none text-white" href="index.html">ANHDUNGSHOP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php foreach ($mod_menumainmenu as $rowmn) : ?>
               <?php require 'views/frontend/mod_mainmenu_items.php'; ?>
            <?php endforeach; ?>

         </ul>
      </div>
   </div>
</nav>
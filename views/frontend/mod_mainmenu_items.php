<?php

use App\Models\Menu;

$mod_menufooterI = Menu::where([['position', '=', 'mainmenu'], ['parent_id', '=', $rowmn->id], ['status', '=', 1]])
   ->orderBy('sort_order', 'ASC')
   ->get();

?>
<?php if (count($mod_menufooterI) > 0) : ?>
   <!-- <li class="nav-item dropdown ">
      <a class="nav-link text-white" href=" <?= $rowmn->link; ?>"> <?= $rowmn->name; ?></a>
    </li> cái lặp lại tên của category -->
   <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-white" href="<?= $rowmn->link; ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         <?= $rowmn->name; ?>
      </a>
      <ul class="dropdown-menu">
         <?php foreach ($mod_menufooterI as $rowmnI) : ?>
            <li>
               <a class="dropdown-item text-main" href="<?= $rowmnI->link; ?>"><?= $rowmnI->name; ?></a>
            </li>
         <?php endforeach; ?>
      </ul>
   </li>
<?php else : ?>
   <li class="nav-item">
      <a class="nav-link text-white" aria-current="page" href="<?= $rowmn->link; ?>"><?= $rowmn->name; ?></a>
   </li>

<?php endif; ?>
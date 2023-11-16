<?php

use App\Models\Category;

$list_category = Category::where([['parent_id', '=', 0], ['status', '=', 1]])
   ->select('name', 'slug', 'id', 'image')
   ->orderBy('sort_order', 'ASC')
   ->get();
?>

<?php require_once "views/frontend/header.php"; ?>
<?php require_once 'views/frontend/mod_siders.php'; ?>
<section class="hdl-maincontent">
   <div class="container">
      <?php foreach ($list_category as $cat) : ?>
         <?php require "views/frontend/product_listhome.php"; ?>
      <?php endforeach; ?>
   </div>
</section>
<?php require_once "views/frontend/mod_lastpost.php"; ?>
<?php require_once "views/frontend/footer.php"; ?>
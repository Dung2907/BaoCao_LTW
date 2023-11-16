<?php

use App\Models\Post;
use App\Libraries\MyClass;

$slug = $_REQUEST['slug'];
$page = Post::where([['slug', '=', $slug], ['type', '=', 'post'], ['status', '=', 1]])->first();
$newPage = Post::where([['type', '=', 'page'], ['status', '=', 1]])->get(); ?>
<?php require_once "views/frontend/header.php"; ?>
<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <a class="text-main" href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
               Chi tiết bài viết
            </li>
         </ol>
      </nav>
   </div>
</section>
<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="col-md-3 order-2 order-md-1">
            <ul class="list-group mb-3 list-page">
               <li class="list-group-item bg-main py-3">Các trang khác</li>
               <li class="list-group-item">
                  <a href="index.php?option=post_topic">Tin tức mới cập nhập</a>
               </li>
               <?php foreach ($newPage as $new) : ?>
                  <li class="list-group-item">
                     <a href="index.php?option=page&slug=<?= $new->slug; ?>"><?= $new->title; ?></a>
                  </li>
               <?php endforeach; ?>
            </ul>
         </div>
         <div class="col-md-9 order-1 order-md-2">
            <h1 class="fs-2 text-main"><?= $page->title; ?></h1>
            <p>
               <?= $page->detail; ?>
            </p>
         </div>
      </div>
   </div>
</section>
<?php require_once "views/frontend/footer.php"; ?>
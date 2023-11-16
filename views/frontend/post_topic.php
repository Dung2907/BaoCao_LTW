<?php

use App\Models\Post;
use App\Libraries\MyClass;

$list_page = Post::where([['type', '=', 'post'], ['status', '=', 1]])->get();
?>

<?php require_once "views/frontend/header.php"; ?>
<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <a class="text-main" href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
               Tin tức
            </li>
         </ol>
      </nav>
   </div>
</section>
<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="col-md-3 order-2 order-md-1">
            <?php require_once "views/frontend/mod_listcategory.php"; ?>
            <?php require_once "views/frontend/mod_listbrand.php"; ?>
            <?php require_once "views/frontend/mod_product_new.php"; ?>
         </div>
         <div class="col-md-9 order-1 order-md-2">
            <div class="post-topic-title bg-main">
               <h3 class="fs-5 py-3 text-center">TIN TỨC</h3>
            </div>
            <?php foreach ($list_page as $page) : ?>
               <div class="post-topic mt-3">
                  <div class="row post-item mb-4">
                     <div class="col-4 col-md-4">
                        <div class="post-item-image">
                           <a href="index.php?option=post">
                              <img src="public/images/post/<?= $page->image; ?>" class="img-fluid" alt="">
                           </a>
                        </div>
                     </div>
                     <div class="col-8 col-md-8">
                        <h2 class="post-item-title fs-5 py-1">
                           <a href="index.php?option=post&slug=<?= $page->slug; ?>">
                              <?= $page->title; ?>
                           </a>
                        </h2>
                        <p> <?= MyClass::word_limit($page->detail, 30); ?></p>
                     </div>
                  </div>


               </div>
            <?php endforeach; ?>
         </div>
      </div>
</section>
<?php require_once "views/frontend/footer.php"; ?>
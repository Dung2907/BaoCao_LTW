<?php

use App\Models\Post;
use App\Libraries\MyClass;

$newPost = Post::where([['type', '=', 'post'], ['status', '=', 1]])->get(); ?>

<section class="hdl-lastpost bg-main mt-3 py-4">
   <div class="container">
      <div class="row">
         <div class="col-md-9">
            <h3>BÀI VIẾT MỚI</h3>
            <div class="row">
               <?php foreach ($newPost as $new) : ?>
                  <div class="col-md-6">
                     <a href="index.php?option=post">
                        <img class="img-fluid" style="width:200px;" src="public/images/post/<?= $new->image; ?>" />
                     </a>
                     <h3 class="post-title fs-4 py-2">
                        <a href="index.php?option=post&slug=<?= $new->slug; ?>">
                           <?= $new->title; ?>
                        </a>
                     </h3>
                     <p><?= MyClass::word_limit($new->detail, 30); ?></p>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
         <div class="col-md-3">FACEBOOK</div>
      </div>
   </div>
</section>
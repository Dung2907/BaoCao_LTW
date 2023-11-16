<?php

use App\Models\Product;

$mod_list_product = Product::where('status', '=', 1)
   ->select('name', 'slug', 'image', 'price', 'price_sale')
   ->orderBy('created_at', 'ASC')
   ->limit(3)
   ->get();
?>
<ul class="list-group mb-3 list-product-new">
   <li class="list-group-item bg-main py-3">Sản phẩm mới </li>
   <?php foreach ($mod_list_product as $pro) : ?>
      <li class="list-group-item">
         <div class="product-item border">
            <div class="product-item-image">
               <a href="index.php?option=product&slug=<?= $pro->slug; ?>">
                  <img src="public/images/product/<?= $pro->image; ?>" class="img-fluid" alt="<?= $pro->image; ?>">
               </a>
            </div>
            <h2 class="product-item-name text-main text-center fs-5 py-1">
               <a href="index.php?option=product&slug=<?= $pro->slug; ?>"><?= $pro->name; ?></a>
            </h2>
            <h3 class="product-item-price fs-6 p-2 d-flex">
               <div class="flex-fill"><del><?= number_format($pro->price); ?>đ</del></div>
               <div class="flex-fill text-end text-main"><?= number_format($pro->price_sale); ?>đ</div>
            </h3>
         </div>
      </li>
   <?php endforeach; ?>
</ul>
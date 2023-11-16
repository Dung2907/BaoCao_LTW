<?php

use App\Models\product;
use App\Models\Category;
use App\Models\Brand;

$list = Product::join('category', 'product.category_id', '=', 'category.id')
   ->join('brand', 'product.brand_id', '=', 'brand.id')
   ->where('product.status', '!=', 0)
   ->select("product.*", "category.name as category_name", "brand.name as brand_name")
   ->get();
?>
<?php require_once "../views/backend/header.php" ?>
<!-- CONTENT -->
<form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả sản phẩm</h1>
                  <a href="index.php?option=product&cat=create" class="btn btn-sm btn-primary">Thêm sản phẩm</a>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header">
               <div class="clo-md-6">
                  <a class="btn btn-success" href="index.php?option=product">Tất cả</a>
                  <a class="btn btn-danger" href="index.php?option=product&cat=trash"> <i class="fa fa-trash"></i> Thùng rác</a>
               </div>
            </div>
            <div class="card-body">
               <?php require_once '../views/backend/message.php' ?>
               <table class="table table-bordered" id="mytable">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th class="text-center" style="width:60px;">Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Tên danh mục</th>
                        <th>Tên thương hiệu</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($list) > 0) : ?>
                        <?php foreach ($list as $items) : ?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox">
                              </td>
                              <td>
                                 <img class="img-fluid" src="../public/images/product/<?= $items->image; ?>" alt="<?= $items->image; ?>">
                              </td>
                              <td>
                                 <div class="name">
                                    <?= $items->name; ?>
                                 </div>
                                 <div class="function_style">
                                    <?php if ($items->status == 1) : ?>
                                       <a class="btn btn-success" href="index.php?option=product&cat=status&id=<?= $items->id; ?>"><i class=" fas fa-toggle-on"></i>Hiện</a>
                                    <?php else : ?>
                                       <a class="btn btn-danger" href="index.php?option=product&cat=status&id=<?= $items->id; ?>"><i class=" fas fa-toggle-off"></i>Ẩn</a>
                                    <?php endif; ?>
                                    <a class="btn btn-primary" href="index.php?option=product&cat=edit&id=<?= $items->id; ?>"><i class=" fas fa-pen"></i>Chỉnh sửa</a>
                                    <a class="btn btn-info" href="index.php?option=product&cat=show&id=<?= $items->id; ?>"><i class=" fas fa-eye"></i>Chi tiết</a> |
                                    <a class="btn btn-danger" href="index.php?option=product&cat=delete&id=<?= $items->id; ?>"><i class=" fas fa-trash"></i>Xoá</a>
                                 </div>
                              </td>
                              <td> <?= $items->category_name; ?> </td>
                              <td><?= $items->brand_name; ?></td>
                           </tr>
                        <?php endforeach; ?>
                     <?php endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>
<?php

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

$id = $_REQUEST['id'];
$product = Product::find($id);
if ($product == null) {
   header("location:index.php?option=product");
}

$list = Product::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();
$list_brand = Brand::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();
$list_category = Category::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();
$category_id_1 = "";
$brand_id_1 = "";
foreach ($list_brand as $brand) {
   if ($brand->id == $product->brand_id) {
      $brand_id_1 .= "<option selected value='$brand->id'>$brand->name </option>";
   } else {
      $brand_id_1 .= "<option value='$brand->id'>$brand->name </option>";
   }
}
foreach ($list_category as $category) {
   if ($category->id == $product->category_id) {
      $category_id_1 .= "<option selected value='$category->id'>$category->name </option>";
   } else {
      $category_id_1 .= "<option value='$category->id'>$category->name </option>";
   }
}

?>
<?php require_once "../views/backend/header.php" ?>
<!-- CONTENT -->
<form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Cập nhật sản phẩm</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=product" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
               <button type="submit" class="btn btn-sm btn-success" name="CAPNHAT">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Cập nhật sản phẩm
               </button>
            </div>
            <div class="card-body">
               <?php require_once '../views/backend/message.php' ?>
               <div class="row">
                  <div class="col-md-8">
                     <div class="mb-3">
                        <label>Tên sản phẩm (*)</label>
                        <input type="text" value="<?= $product->name; ?>" placeholder="Nhập tên sản phẩm" name="name" class="form-control">
                        <input type="hidden" value="<?= $product->id; ?>" name="id">
                     </div>
                     <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" value="<?= $product->name; ?>" placeholder="Nhập slug" name="slug" class="form-control">
                        <input type="hidden" value="<?= $product->id; ?>" name="id">
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="mb-3">
                              <label>Danh mục (*)</label>
                              <select name="category_id" class="form-control">
                                 <option value="">Chọn danh mục</option>
                                 <?= $category_id_1; ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="mb-3">
                              <label>Thương hiệu (*)</label>
                              <select name="brand_id" class="form-control">
                                 <option value="">Chọn thương hiệu</option>
                                 <?= $brand_id_1; ?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label>Chi tiết (*)</label>
                        <textarea value="<?= $product->detail; ?>" name="detail" placeholder="Nhập chi tiết sản phẩm" rows="5" class="form-control"></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Mô tả (*)</label>
                        <textarea value="<?= $product->description; ?>" name="description" placeholder="Nhập chi tiết sản phẩm" rows="5" class="form-control"></textarea>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label>Giá bán (*)</label>
                        <input type="number" value="<?= $product->price; ?>" min="<?= $product->price ?>" name="price" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Giá sale (*)</label>
                        <input type="number" value="<?= $product->price_sale; ?>" min="1" name="price_sale" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Số lương (*)</label>
                        <input type="number" value="<?= $product->qty; ?>" min="1" name="qty" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input type="file" value="<?= $product->image; ?>" name="image" class="form-control">
                     </div>

                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1">Xuất bản</option>
                           <option value="2">Chưa xuất bản</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php" ?>
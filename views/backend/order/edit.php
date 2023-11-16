<?php

use App\Models\order;

$id = $_REQUEST['id'];
$order = order::find($id);
if ($order == null) {
   header("location:index.php?option=order");
}
?>
<?php require_once "../views/backend/header.php" ?>
<!-- CONTENT -->
<form action="index.php?option=order&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Cập nhật người dùng </h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Lưu
               </button>
               <a href="index.php?option=order" class="btn btn-sm btn-info">
                  <i class="fa fa-rotate-left" aria-hidden="true"></i>
                  Về danh sách </a>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label>Họ tên (*)</label>
                        <input type="text" name="<?= $order->name ?>" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Điện thoại</label>
                        <input type="text" name="<?= $order->phone ?>" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Email</label>
                        <input type="text" name="<?= $order->email ?>" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Tên đăng nhập</label>
                        <input type="text" name="<?= $order->ordername ?>" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Mật khẩu</label>
                        <input type="password" name="<?= $order->password ?>" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Xác nhận mật khẩu</label>
                        <input type="password" name="password_re" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label>Địa chỉ (*)</label>
                        <input type="address" name="<?= $order->address ?>" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input type="file" name="<?= $order->image ?>" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Giới tính</label>
                        <select name="gender" class="form-control">
                           <option value="1">Nam </option>
                           <option value="2">Nữ</option>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1">Hiện thị</option>
                           <option value="2">Không hiện thị</option>
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
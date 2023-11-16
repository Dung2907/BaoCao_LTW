<?php

use App\Models\Order;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM order wher status!=0 and id=1 order by created_at desc
$id = $_REQUEST['id'];
$order = Order::find($id);
if ($order == null) {
   header("location:index.php?option=order");
}
?>
<?php require_once "../views/backend/header.php" ?>

<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Chi tiết đặt hàng
               </h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header ">
            <div class="roww">
               <a href="index.php?option=order" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-12">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th>Tên trường</th>
                              <th>Giá trị</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>ID</td>
                              <td><?= $order->id; ?></td>
                           </tr>
                           <tr>
                              <td>Id người dùng</td>
                              <td><?= $order->user_id; ?></td>
                           </tr>
                           <tr>
                              <td>Tên đặt hàng</td>
                              <td><?= $order->deliveryname; ?></td>
                           </tr>
                           <tr>
                              <td>Điện thoại</td>
                              <td><?= $order->deliveryphone; ?></td>
                           </tr>

                           <tr>
                              <td>email</td>
                              <td><?= $order->deliveryemail; ?></td>
                           </tr>
                           <tr>
                              <td>Ghi chú</td>
                              <td><?= $order->note; ?></td>
                           </tr>
                           <tr>
                              <td>Địa chỉ đặt hàng</td>
                              <td><?= $order->deliveryaddress; ?></td>
                           </tr>
                           <tr>
                              <td>Thời gian thêm</td>
                              <td><?= $order->created_at; ?></td>
                           </tr>
                           <tr>
                              <td>Thêm bởi</td>
                              <td><?= $order->created_by; ?></td>
                           </tr>
                           <tr>
                              <td>Thay đổi bởi</td>
                              <td><?= $order->updated_at; ?></td>
                           </tr>
                           <tr>
                              <td>Thời gian thay đổi</td>
                              <td><?= $order->updated_by; ?></td>
                           </tr>
                           <td>Status</td>
                           <td><?= $order->status; ?></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
   </section>
</div>

<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php" ?>
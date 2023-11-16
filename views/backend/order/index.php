<?php

use App\Models\Order;

$list = Order::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php" ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Tất cả khách hàng</h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header">
            <div class="roww">
               <div class="clo-md-6">
                  <a  class="btn btn-success" href="index.php?option=order">Tất cả</a>
                  <a  class="btn btn-danger" href="index.php?option=order&cat=trash">
                  <i class="fa fa-trash"></i>   Thùng rác</a>
               </div>
            </div>
            <div class="card-body">
               <table class="table table-bordered" id="mytable">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th>Họ tên</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ người nhận</th>
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
                                 <div class="name">
                                    <?= $items->deliveryname; ?>
                                 </div>

                                 <div class="function_style">
                                    <?php if ($items->status == 1) : ?>
                                       <a  class="btn btn-success" href="index.php?option=order&cat=status&id=<?= $items->id; ?>">
                                          <i class=" fas fa-toggle-on"></i> Hiện</a>
                                    <?php else : ?>
                                       <a class="btn btn-danger" href="index.php?option=order&cat=status&id=<?= $items->id; ?>"> <i class=" fas fa-toggle-off"></i>Ẩn</a> |
                                    <?php endif; ?>
                                    <a  class="btn btn-primary" href="index.php?option=order&cat=edit&id=<?= $items->id; ?>"><i class="  fas fa-pen"></i>Chỉnh sửa</a> |
                                    <a  class="btn btn-info"href="index.php?option=order&cat=show&id=<?= $items->id; ?>"><i class=" fas fa-eye"></i>Chi tiết</a> |
                                    <a  class="btn btn-danger"href="index.php?option=order&cat=delete&id=<?= $items->id; ?>"><i class=" fas fa-trash"></i>Xoá</a>
                                 </div>
                              </td>
                              <td><?= $items->deliveryphone; ?></td>
                              <td><?= $items->deliveryemail; ?></td>
                              <td><?= $items->deliveryaddress; ?></td>

                           </tr>
                        <?php endforeach; ?>
                     <?php endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
   </section>
</div>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>
<?php

use App\Models\Contact;

$list = Contact::all();
?>
<?php require_once "../views/backend/header.php" ?>

<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Tất cả liên hệ</h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header text-right">
            Noi dung
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
                     <th>Tiêu đề</th>
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
                                 <?= $items->name; ?>
                              </div>
                              <div class="function_style">
                                 <?php if ($items->status == 1) : ?>
                                    <a class="text-success" href="index.php?option=contact&cat=status&id=<?= $items->id; ?>">Hiện</a>
                                 <?php else : ?>
                                    <a class="text-danger" href="index.php?option=contact&cat=status&id=<?= $items->id; ?>">Ẩn</a>
                                 <?php endif; ?>
                                 <a href="index.php?option=contact&cat=content&id=<?= $items->id; ?>">Trả lời</a>
                                 <a href="index.php?option=contact&cat=show&id=<?= $items->id; ?>">Chi tiết</a>
                                 <a href="index.php?option=contact&cat=delete&id=<?= $items->id; ?>">Xoá</a>
                              </div>
                           </td>
                           <td><?= $items->phone; ?></td>
                           <td><?= $items->email; ?></td>
                           <td>Tieu đề</td>
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
<?php require_once "../views/backend/footer.php" ?>
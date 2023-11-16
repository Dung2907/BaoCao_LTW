<?php

use App\Models\Banner;

$list = Banner::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();
?>
<?php require_once "../views/backend/header.php" ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">

               <h1 class="d-inline">Tất cả Banner</h1>
               <a href="index.php?option=banner&cat=create" class="btn btn-sm btn-primary">Thêm banner</a>
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
                  <a class="btn btn-success" href="index.php?option=banner">Tất cả</a>
                  <a class="btn btn-danger" href="index.php?option=banner&cat=trash"><i class="fa fa-trash"></i>Thùng rác</a>
               </div>
               <div class="clo-md-6 ">
                  <strong>Nội Dung</strong>
               </div>
            </div>
         </div>
         <div class="card-body">
            <table class="table table-bordered" id="mytable">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox">
                     </th>
                     <th class="text-center" style="width:130px;">Hình ảnh</th>
                     <th>Tên banner</th>
                     <th>Liên kết</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if (count($list) > 0) : ?>
                     <?php foreach ($list as $ban) : ?>
                        <tr class="datarow">
                           <td>
                              <input type="checkbox">
                           </td>
                           <td>
                              <img class="img-fluid" src="../public/images/banner/<?= $ban->image; ?>" alt=" <?= $ban->image; ?>">
                           </td>
                           <td>
                              <div class="name">
                                 <?= $ban->name; ?>
                              </div>
                              <div class="function_style">
                                 <?php if ($ban->status == 1) : ?>
                                    <a class="btn btn-success" href="index.php?option=banner&cat=status&id=<?= $ban->id; ?>"> <i class=" fas fa-toggle-on"></i>Hiện</a> |
                                 <?php else : ?>
                                    <a class="btn btn-danger" href="index.php?option=banner&cat=status&id=<?= $ban->id; ?>"> <i class=" fas fa-toggle-off"></i>Ẩn</a> |
                                 <?php endif; ?>
                                 <a class="btn btn-primary" href="index.php?option=banner&cat=edit&id=<?= $ban->id; ?>"> <i class="  fas fa-pen"></i>Chỉnh sửa</a> |
                                 <a class="btn btn-info" href="index.php?option=banner&cat=show&id=<?= $ban->id; ?>"> <i class=" fas fa-eye"></i>Chi tiết</a> |
                                 <a class="btn btn-danger" href="index.php?option=banner&cat=delete&id=<?= $ban->id; ?>"> <i class=" fas fa-trash"></i>Xoá</a>
                              </div>
                           </td>
                           <td> <?= $ban->link; ?></td>
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
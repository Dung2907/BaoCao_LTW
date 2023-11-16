<?php

use App\Models\Post;

$list = Post::where([['status', '!=', 0], ['type', '=', 'page']])->orderBy('Created_at', 'DESC')->get();

?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Tất cả bài viết</h1>
               <a href="index.php?option=page&cat=create" class="btn btn-sm btn-primary">Thêm bài viết</a>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">

      <div class="card">
         <div class="card-header p-2">
            <div class="clo-md-6">
               <a  class="btn btn-success" href="index.php?option=post">Tất cả</a>
               <a class="btn btn-danger" href="index.php?option=post&cat=trash"> <i class="fas fa-trash"></i>Thùng rác</a>
            </div>
         </div>
      </div>
      <div class="card-body p-2">
         <?php require_once '../views/backend/message.php' ?>
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th class="text-center" style="width:30px;">
                     <input type="checkbox">
                  </th>
                  <th class="text-center" style="width:130px;">Hình ảnh</th>
                  <th>Tiêu đề bài viết</th>
                  <th>Tên Slug</th>
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
                           <img src="../public/images/<?= $items->image; ?>" alt="<?= $items->image; ?>">
                        </td>
                        <td>
                           <div class="name">
                              <?= $items->title; ?>
                           </div>
                           <div class="function_style">
                              <?php if ($items->status == 1) : ?>
                                 <a class="btn btn-success" href="index.php?option=post&cat=status&id=<?= $items->id; ?>"><i class=" fas fa-toggle-on"></i>Hiện</a>
                              <?php else : ?>
                                 <a class="btn btn-danger" href="index.php?option=post&cat=status&id=<?= $items->id; ?>"><i class=" fas fa-toggle-off"></i>Ẩn</a></a>
                              <?php endif; ?>
                              <a class="btn btn-primary" href="index.php?option=page&cat=edit&id=<?= $items->id; ?>"><i class=" fas fa-pen"></i>Chỉnh sửa</a>
                              <a class="btn btn-info" href="index.php?option=page&cat=show&id=<?= $items->id; ?>"><i class=" fas fa-eye"></i>Chi tiết</a> |
                              <a class="btn btn-danger" href="index.php?option=page&cat=delete&id=<?= $items->id; ?>"><i class=" fas fa-trash"></i>Xoá</a>
                           </div>
                        </td>
                        <td><?= $items->slug; ?></td>
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
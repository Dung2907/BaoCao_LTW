<?php

use App\Models\Topic;

$id = $_REQUEST['id'];
$topic = Topic::find($id);
if ($topic == null) {
   header("location:index.php?option=topic");
}
?>
<?php require_once "../views/backend/header.php" ?>

<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Chi tiết thương hiệu</h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header ">
            <div class="roww">
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
                              <td><?= $topic->id; ?></td>
                           </tr>
                           <tr>
                              <td>Tên chủ đề </td>
                              <td><?= $topic->name; ?></td>
                           </tr>
                           <tr>
                              <td>Slug</td>
                              <td><?= $topic->slug; ?></td>
                           </tr>
                           <tr>
                              <td>Hình ảnh</td>
                              <td><img stype="width:100px" class="img-fluid" src="../public/images/topic/<?= $topic->image; ?>" alt=" <?= $topic->image; ?>"></td>
                           </tr>
                           <tr>
                              <td>Sort Order</td>
                              <td><?= $topic->sort_order; ?></td>
                           </tr>
                           <tr>
                              <td>Mô tả</td>
                              <td><?= $topic->metadesc; ?></td>
                           </tr>
                           <tr>
                              <td>Thời gian thêm</td>
                              <td><?= $topic->created_at; ?></td>
                           </tr>
                           <tr>
                              <td>Thêm bởi</td>
                              <td><?= $topic->created_by; ?></td>
                           </tr>
                           <tr>
                              <td>Thay đổi bởi</td>
                              <td><?= $topic->updated_at; ?></td>
                           </tr>
                           <tr>
                              <td>Thời gian thay đổi</td>
                              <td><?= $topic->updated_by; ?></td>
                           </tr>
                           <td>Status</td>
                           <td><?= $topic->status; ?></td>
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
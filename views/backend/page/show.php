<?php

use App\Models\Post;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM page wher status!=0 and id=1 order by created_at desc
$id = $_REQUEST['id'];
$page = Post::find($id);
if ($page == null) {
   header("location:index.php?option=page");
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
            <div class="text-right"> <a href="index.php?option=page" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a></div>
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
                              <td><?= $page->id; ?></td>
                           </tr>
                           <tr>
                              <td>Tiêu đề bài viết</td>
                              <td><?= $page->title; ?></td>
                           </tr>
                           <tr>
                              <td>Tên chủ đề</td>
                              <td><?= $page->topic_id; ?></td>
                           </tr>
                           <tr>
                              <td>Slug</td>
                              <td><?= $page->slug; ?></td>
                           </tr>
                           <tr>
                              <td>Hình ảnh</td>
                              <td><img stype="width:100px" class="img-fluid" src="../public/images/page/<?= $page->image; ?>" alt=" <?= $page->image; ?>"></td>
                           </tr>
                           <tr>
                              <td>Chi tiết</td>
                              <td><?= $page->detail; ?></td>
                           </tr>
                           <tr>
                              <td>Tên kiểu bài</td>
                              <td><?= $page->type; ?></td>
                           </tr>
                           <tr>
                              <td>Mô tả</td>
                              <td><?= $page->description; ?></td>
                           </tr>
                           <tr>
                              <td>Thời gian thêm</td>
                              <td><?= $page->created_at; ?></td>
                           </tr>
                           <tr>
                              <td>Thêm bởi</td>
                              <td><?= $page->created_by; ?></td>
                           </tr>
                           <tr>
                              <td>Thay đổi bởi</td>
                              <td><?= $page->updated_at; ?></td>
                           </tr>
                           <tr>
                              <td>Thời gian thay đổi</td>
                              <td><?= $page->updated_by; ?></td>
                           </tr>
                           <td>Status</td>
                           <td><?= $page->status; ?></td>
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
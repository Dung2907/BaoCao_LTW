<?php

use App\Models\Post;
use App\Models\Topic;

$id = $_REQUEST['id'];
$page = Post::find($id);
if ($page == null) {
   header("location:index.php?option=page");
   $list_topic = Topic::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();
   $topic_id_1 = "";
   foreach ($list_topic as $topic) {
      $topic_id_1 = "<option value='$topic->id'>$topic->name </option>";
   }
}
?>
<?php require_once "../views/backend/header.php" ?>

<!-- CONTENT -->
<form action="index.php?option=page&cat=process" method="page" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Cập nhật thương hiệu</h1>
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
               <a href="index.php?option=page" class="btn btn-sm btn-info">
                  <i class="fa fa-rotate-left" aria-hidden="true"></i>
                  Về danh sách </a>
            </div>
            <div class="card-body">
               <?php require_once '../views/backend/message.php' ?>
               <div class="row">
                  <div class="col-md-7">
                     <div class="mb-3">
                        <label>Tiêu đề bài viết (*)</label>
                        <input value="<?= $page->title; ?>" type="text" name="title" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Kiểu bài viết (*)</label>
                        <input value="<?= $page->type; ?>" type="text" name="type" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Chi tiết bài viết (*)</label>
                        <input value="<?= $page->detail; ?>" type="text" name="detail" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Mô tả (*)</label>
                        <input value="<?= $page->description; ?>" type="text" name="description" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Slug</label>
                        <input value="<?= $page->slug; ?>" type="text" name="slug" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="mb-3">
                        <label>Chủ đề (*)</label>
                        <select name="topic_id" class="form-control">
                           <?= $topic_id_1; ?>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input value="<?= $page->image; ?>" type="file" name="image" class="form-control">
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
   </div>
   </div>
   </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php" ?>
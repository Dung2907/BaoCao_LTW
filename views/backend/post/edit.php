<?php

use App\Models\Post;
use App\Models\Topic;

$id = $_REQUEST['id'];
$post = Post::find($id);
$list_topic = Topic::where('status', '!=', 0)->orderBy('Created_at', 'DESC')->get();
$topic_id_1 = "";
foreach ($list_topic as $topic) {
   $topic_id_1 = "<option value='$topic->id'>$topic->name</option>";
}
if ($post == null) {
   header("location:index.php?option=post");
}
?>
<?php require_once "../views/backend/header.php" ?>

<!-- CONTENT -->
<form action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Thêm mới bài viết</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=post" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
               <button class="btn btn-sm btn-success" type="submit" name="THEM">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Thêm bài viết
               </button>
            </div>
            <div class="card-body">
               <?php require_once '../views/backend/message.php' ?>
               <div class="row">
                  <div class="col-md-7">
                     <div class="mb-3">
                        <label>Tiêu đề bài viết (*)</label>
                        <input value="<?= $post->title; ?>" type="text" name="title" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Kiểu bài viết (*)</label>
                        <input value="<?= $post->type; ?>" type="text" name="type" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Chi tiết bài viết (*)</label>
                        <input value="<?= $post->detail; ?>" type="text" name="detail" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Mô tả (*)</label>
                        <input value="<?= $post->description; ?>" type="text" name="description" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Slug</label>
                        <input value="<?= $post->slug; ?>" type="text" name="slug" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="mb-3">
                        <label>Chủ đề (*)</label>
                        <select name="topic_id" class="form-control">
                           <option value="">Chọn chủ đề</option>
                           </option>
                           <?= $topic_id_1; ?>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input value="<?= $post->image; ?>" type="file" name="image" class="form-control">
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
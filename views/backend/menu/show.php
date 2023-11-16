<?php

use App\Models\Menu;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM menu wher status!=0 and id=1 order by created_at desc
$id = $_REQUEST['id'];
$menu = Menu::find($id);
if ($menu == null) {
   header("location:index.php?option=menu");
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
                              <td><?= $menu->id; ?></td>
                           </tr>
                           <tr>
                              <td>Tên Menu</td>
                              <td><?= $menu->name; ?></td>
                           </tr>
                           <tr>
                              <td>Liên kết</td>
                              <td><?= $menu->link; ?></td>
                           </tr>
                           <tr>
                              <td>Kiểu Menu</td>
                              <td><?= $menu->type; ?></td>
                           </tr>
                           <tr>
                              <td>Mã trong bảng</td>
                              <td><?= $menu->table_id; ?></td>
                           </tr>

                           <tr>
                              <td>Thứ tự</td>
                              <td><?= $menu->sort_order; ?></td>
                           </tr>
                           <tr>
                              <td>Vị trí</td>
                              <td><?= $menu->position; ?></td>
                           </tr>
                           <tr>
                              <td>Mã cấp cha</td>
                              <td><?= $menu->parent_id; ?></td>
                           </tr>
                           <tr>
                              <td>Ngày Tạo</td>
                              <td><?= $menu->created_at; ?></td>
                           </tr>
                           <tr>
                              <td>Người tạo</td>
                              <td><?= $menu->created_by; ?></td>
                           </tr>
                           <td>Ngày sửa</td>
                           <td><?= $menu->updated_at; ?></td>
                           </tr>
                           <tr>
                              <td>Người sửa</td>
                              <td><?= $menu->updated_by; ?></td>
                           </tr>
                           <tr>
                              <td>Trạng thái</td>
                              <td><?= $menu->status; ?></td>
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
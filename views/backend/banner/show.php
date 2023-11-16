<?php
use App\Models\Banner;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM banner wher status!=0 and id=1 order by created_at desc
$id=$_REQUEST['id'];
$banner=Banner::find($id);
if($banner==null)
{
    header("location:index.php?option=banner");
}
?>
<?php require_once "../views/backend/header.php" ?>

      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết Xu hướng</h1>
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
                            <td><?=$banner->id;?></td>
                    </tr>
                            <tr>
                            <td>Tên xu hướng</td>
                            <td><?=$banner->name;?></td>
                    </tr>
                    <tr>
                            <td>Link</td>
                            <td><?=$banner->link;?></td>
                    </tr>
                    <tr>
                            <td>Hình ảnh</td>
                            <td><img stype="width:100px" class="img-fluid" src="../public/images/banner/<?=$banner->image;?>" alt=" <?=$banner->image;?>"></td>
                    </tr>
                    <tr>
                            <td>Sort Order</td>
                            <td><?=$banner->sort_order;?></td>
                    </tr>
                   
                    <tr>
                            <td>Thời gian thêm</td>
                            <td><?=$banner->created_at;?></td>
                    </tr>
                    <tr>
                            <td>Thêm bởi</td>
                            <td><?=$banner->created_by;?></td>
                    </tr>
                    <tr>
                            <td>Thay đổi bởi</td>
                            <td><?=$banner->updated_at;?></td>                          
                    </tr>
                    <tr>
                            <td>Thời gian thay đổi</td>
                            <td><?=$banner->updated_by;?></td>
                    </tr>
                            <td>Status</td>
                            <td><?=$banner->status;?></td>
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

<?php
use App\Models\Contact;
//status=0--> Rac
//status=1--> Hiện thị lên trang người dùng
//
//SELECT * FROM contact wher status!=0 and id=1 order by created_at desc
$id=$_REQUEST['id'];
$contact=Contact::find($id);
if($contact==null)
{
    header("location:index.php?option=contact");
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
                            <td><?=$contact->id;?></td>
                    </tr>
                            <tr>
                            <td>Tên người liên hệ </td>
                            <td><?=$contact->name;?></td>
                    </tr>
                    <tr>
                            <td>Điện thoại</td>
                            <td><?=$contact->phone;?></td>
                    </tr>
                    <tr>
                            <td>EMAIL</td>
                            <td><?=$contact->email;?></td>
                    </tr>
                    <tr>
                            <td>Slug</td>
                            <td><?=$contact->slug;?></td>
                    </tr>
                    <tr>
                            <td>Hình ảnh</td>
                            <td><img stype="width:100px" class="img-fluid" src="../public/images/contact/<?=$contact->image;?>" alt=" <?=$contact->image;?>"></td>
                    </tr>
                    <tr>
                            <td>Sort Order</td>
                            <td><?=$contact->sort_order;?></td>
                    </tr>
                    <tr>
                            <td>Mô tả</td>
                            <td><?=$contact->description	;?></td>
                    </tr>
                    <tr>
                            <td>Thời gian thêm</td>
                            <td><?=$contact->created_at;?></td>
                    </tr>
                    <tr>
                            <td>Thêm bởi</td>
                            <td><?=$contact->created_by;?></td>
                    </tr>
                    <tr>
                            <td>Thay đổi bởi</td>
                            <td><?=$contact->updated_at;?></td>                          
                    </tr>
                    <tr>
                            <td>Thời gian thay đổi</td>
                            <td><?=$contact->updated_by;?></td>
                    </tr>
                            <td>Status</td>
                            <td><?=$contact->status;?></td>
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

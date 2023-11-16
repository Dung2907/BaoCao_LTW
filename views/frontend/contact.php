<?php

use App\Models\Contact;

if (isset($_POST["ADD"])) {
   $contact = new Contact();
   //lấy từ form
   $contact->name = $_POST['name'];
   $contact->phone = $_POST['phone'];
   $contact->email = $_POST['email'];
   $contact->title = $_POST['title'];
   $contact->content = $_POST['content'];
   $contact->status = 1;

   //tư sinh ra
   $contact->created_at = date('Y-m-d H:i:s');
   var_dump($contact);
   //luu vao csdl
   //ínet
   $contact->save();
   header("location:index.php?");
}

?>
<?php require_once "views/frontend/header.php"; ?>
<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <a class="text-main" href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
               Liên hệ
            </li>
         </ol>
      </nav>
   </div>
</section>
<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.746776096385!2d106.77242407468411!3d10.830680489321376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317526ffdc466379%3A0x89b09531e82960d!2zMjAgVMSDbmcgTmjGoW4gUGjDuiwgUGjGsOG7m2MgTG9uZyBCLCBRdeG6rW4gOSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oIDcwMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1692683712719!5m2!1svi!2s" width="1400" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
         <form action="index.php?option=contact" method="post" name="contact">
            <div class="col-md-6">
               <div class="mb-3">
                  <label for="name" class="text-main">Họ tên</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ tên">
               </div>
               <div class="mb-3">
                  <label for="phone" class="text-main">Điện thoại</label>
                  <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập điện thoại">
               </div>
               <div class="mb-3">
                  <label for="email" class="text-main">Email</label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Nhập email">
               </div>
               <div class="mb-3">
                  <label for="title" class="text-main">Tiêu đề</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Nhập tiêu đề">
               </div>
               <div class="mb-3">
                  <label for="content" class="text-main">Nội dung</label>
                  <textarea name="content" id="content" class="form-control" placeholder="Nhập nội dung liên hệ"></textarea>
                  <label for="status" class="text-main">Trạng thái</label>
                  <select name="status" class="form-control">
                     <option value="1">Xuất bản</option>
                     <option value="2">Chưa xuất bản</option>
                  </select>
               </div>
               <div class="mb-3">
                  <button type="submit" name="ADD" class="btn btn-main">Gửi liên hệ</button>
               </div>
            </div>
         </form>


      </div>
   </div>
</section>
<?php require_once "views/frontend/footer.php"; ?>
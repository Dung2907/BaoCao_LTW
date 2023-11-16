<?php

use App\Models\Banner;
use App\Libraries\MyClass;
// Thêm cơ sở dữ liệu mới
if(isset($_POST['THEM']))
{
    $banner=new Banner();
    //lấy từ form
    $banner->name = $_POST['name'];
    $banner->link =(strlen($_POST['link'])>0) ? $_POST['link']: MyClass::str_slug($_POST['name']);
    $banner->position = $_POST['position'];
    $banner->status = $_POST['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/banner/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$banner->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $banner->image =$filename;
        }
    }
    //tư sinh ra
    $banner->created_at = date('Y-m-d-H:i:s');
    $banner->created_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($banner);
    //luu vao csdl
    //ínet
    $banner->save();
    //
    header("location:index.php?option=banner");
}
// sửa và cập nhập lại
if(isset($_POST['CAPNHAT']))
{
    $id= $_POST['id'];
    $banner= banner::find($id);
    //lấy từ form
    $banner->name = $_POST['name'];
    $banner->link =(strlen($_POST['slug'])>0) ? $_POST['slug']: MyClass::str_slug($_POST['name']);
    $banner->position = $_POST['position '];
    $banner->status = $_POST['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        //xoa hinh cu
        // đẩy hinh mới lên

        $target_dir = "../public/images/banner/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$banner->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $banner->image =$filename;
        }
    }
    //tư sinh ra
    $banner->updated_at = date('Y-m-d-H:i:s');
    $banner->updated_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($banner);
    //luu vao csdl
    //ínet
    $banner->save();
    //
    header("location:index.php?option=banner");
}
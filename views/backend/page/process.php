<?php

use App\Models\Post;
use App\Libraries\MyClass;

if(isset($_page['THEM']))
{
    $page=new Post();
    //lấy từ form
    $page->topic_id = $_page['topic_id'];
    $page->title= $_page['title'];
    $page->detail = $_page['detail'];
    $page->slug =(strlen($_page['slug'])>0) ? $_page['slug']: MyClass::str_slug($_page['name']);
    $page->description = $_page['description'];
    $page->status = $_page['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/page/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$page->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $page->image =$filename;
        }
    }
    //tư sinh ra
    $page->created_at = date('Y-m-d-H:i:s');
    $page->created_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($page);
    //luu vao csdl
    //ínet
    $page->save();
    MyClass::set_flash('message', ['msg' => 'Thêm thành công ', 'type' => 'success']);
    //
    header("location:index.php?option=page");
}





if(isset($_page['CAPNHAT']))
{
    $id= $_page['id'];
    $page= Post::find($id);
    if($page==null){
        MyClass::set_flash('message', ['msg' => 'Cập nhật  thất bại', 'type' => 'success']);
        header("location:index.php?option=page");
    }
    //lấy từ form
    $page->name = $_page['name'];
    $page->slug =(strlen($_page['slug'])>0) ? $_page['slug']: MyClass::str_slug($_page['name']);
    $page->description = $_page['description'];
    $page->status = $_page['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        //xoa hinh cu


        
        // đẩy hinh mới lên

        $target_dir = "../public/images/page/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$page->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $page->image =$filename;
        }
    }
    //tư sinh ra
    $page->updated_at = date('Y-m-d-H:i:s');
    $page->updated_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($page);
    //luu vao csdl
    //ínet
    $page->save();
    MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
    //
    header("location:index.php?option=page");
}
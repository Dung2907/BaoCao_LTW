<?php

use App\Models\Contact;
use App\Libraries\MyClass;

if(isset($_POST['THEM']))
{
    $contact=new Contact();
    //lấy từ form
    $contact->name = $_POST['name'];
    $contact->slug =(strlen($_POST['slug'])>0) ? $_POST['slug']: MyClass::str_slug($_POST['name']);
    $contact->description = $_POST['description'];
    $contact->status = $_POST['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        $target_dir = "../public/images/contact/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$contact->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $contact->image =$filename;
        }
    }
    //tư sinh ra
    $contact->created_at = date('Y-m-d-H:i:s');
    $contact->created_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($contact);
    //luu vao csdl
    //ínet
    $contact->save();
    //
    header("location:index.php?option=contact");
}





if(isset($_POST['CAPNHAT']))
{
    $id= $_POST['id'];
    $contact= contact::find($id);
    //lấy từ form
    $contact->name = $_POST['name'];
    $contact->slug =(strlen($_POST['slug'])>0) ? $_POST['slug']: MyClass::str_slug($_POST['name']);
    $contact->description = $_POST['description'];
    $contact->status = $_POST['status'];
    //Xử lí uploadfile
    if(strlen($_FILES['image']['name'])>0){
        //xoa hinh cu


        
        // đẩy hinh mới lên

        $target_dir = "../public/images/contact/";
        $target_file= $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(in_array($extension, ['jpg','jpeg','png','gif','webp']))
        {
            $filename=$contact->slug.'.'.$extension;
            move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
            $contact->image =$filename;
        }
    }
    //tư sinh ra
    $contact->updated_at = date('Y-m-d-H:i:s');
    $contact->updated_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
    var_dump($contact);
    //luu vao csdl
    //ínet
    $contact->save();
    //
    header("location:index.php?option=contact");
}
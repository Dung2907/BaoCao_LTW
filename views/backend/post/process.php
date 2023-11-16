<?php

use App\Models\Post;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $post = new Post();
    //lấy từ form
    $post->topic_id = $_POST['topic_id'];
    $post->title = $_POST['title'];
    $post->detail = $_POST['detail'];
    $post->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['title']);
    $post->type = $_POST['type'];
    $post->description = $_POST['description'];
    $post->status = $_POST['status'];
    //Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/post/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = $post->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $post->image = $filename;
        }
    }
    //tư sinh ra
    $post->created_at = date('Y-m-d-H:i:s');
    $post->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($post);
    //luu vao csdl
    //ínet
    $post->save();
    //
    MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
          header("location:index.php?option=post");
}





if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $post = post::find($id);
    if ($post == null) {
        MyClass::set_flash('message', ['msg' => 'Cập nhật thất bại 404', 'type' => 'success']);
        header("location:index.php?option=post");
    }
    //lấy từ form
    $post->topic_id = $_POST['topic_id'];
    $post->title = $_POST['title'];
    $post->detail = $_POST['detail'];
    $post->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['title']);
    $post->type = $_POST['type'];
    $post->description = $_POST['description'];
    $post->status = $_POST['status'];
    //Xử lí uploadfile
    if (strlen($_FILES['image']['name']) > 0) {
        //xoa hinh cu



        // đẩy hinh mới lên

        $target_dir = "../public/images/post/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $filename = $post->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $post->image = $filename;
        }
    }
    //tư sinh ra
    $post->updated_at = date('Y-m-d-H:i:s');
    $post->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($post);
    //luu vao csdl
    //ínet
    $post->save();
    //
    MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
    header("location:index.php?option=post");
}

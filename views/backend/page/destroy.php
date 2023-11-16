<?php
use App\Libraries\MyClass;
use App\Models\Post;
$id=$_REQUEST['id'];
$post=post::find($id);
if($post==null)
{MyClass::set_flash('message', ['msg' => 'Xóa vĩnh viễn  thất bại', 'type' => 'success']);
    header("location:index.php?option=post&cat=trash");
}
$post->delete();
MyClass::set_flash('message', ['msg' => 'Xóa vĩnh viễn  thất bại', 'type' => 'success']);
header("location:index.php?option=post&cat=trash");
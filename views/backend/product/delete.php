<?php
use App\Libraries\MyClass;
use App\Models\Product;
$id=$_REQUEST['id'];
$product=Product::find($id);
if($product==null)
{  MyClass::set_flash('message', ['msg' => 'Xóa thất bại 404! ', 'type' => 'success']);
    header("location:index.php?option=product");
}
$product->status = 0;
$product->updated_at=date('Y-m-d H:i:s');
$product->updated_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
$product->save();
MyClass::set_flash('message', ['msg' => 'Xóa thành công ', 'type' => 'success']);
header("location:index.php?option=product");
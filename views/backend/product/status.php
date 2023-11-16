<?php
use App\Libraries\MyClass;
use App\Models\Product;
$id=$_REQUEST['id'];
$product=Product::find($id);
if($product==null)
{  MyClass::set_flash('message', ['msg' => 'Cập nhât thất bại! ', 'type' => 'success']);
    header("location:index.php?option=product");
}
$product->status = ($product->status==1) ? 2 : 1;
$product->updated_at=date('Y-m-d H:i:s');
$product->updated_by = (isset($_SESSION['user_id']))? $_SESSION['user_id'] : 1;
$product->save();
MyClass::set_flash('message', ['msg' => 'Cập nhât thành công ', 'type' => 'success']);
header("location:index.php?option=product");
<?php

use App\Models\Product;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$product = Product::find($id);
if ($product == null) {
    MyClass::set_flash('message', ['msg' => 'Xóa hoàn toàn thất bại ! 404', 'type' => 'success']);
    header("location:index.php?option=product&cat=trash");
}
$product->delete();
MyClass::set_flash('message', ['msg' => 'Xóa hoàn toàn thành công ', 'type' => 'success']);
header("location:index.php?option=product&cat=trash");

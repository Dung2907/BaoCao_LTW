<?php
use App\Libraries\Cart;
use App\Models\Product;
if (isset($_REQUEST['addcart'])) {
    $id = $_GET['id'];
    $product = Product::find($id);
    $qty = $_GET['qty'];
    //lưu vao session
    $cart_item = [
        'id' => $id,
        'name' => $product->name,
        'price' => $product->price_sale,
        'qty' => $qty,
        'image' => $product->image
    ];
    Cart::addCart($cart_item);
    echo count($_SESSION['cart']);
}

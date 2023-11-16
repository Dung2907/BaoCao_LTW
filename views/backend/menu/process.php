<?php

use App\Models\Menu;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Post;
use App\Models\Topic;
use App\Libraries\MyClass;

if (isset($_POST['ADDCATEGORY'])) {
    if (isset($_POST['CategoryId'])) {
        $listid = $_POST['CategoryId'];
        foreach ($listid as $id) {
            $category = Category::find($id);
            $menu = new Menu();
            $menu->name = $category->name;
            $menu->link = 'index.php?option=product&cat=' . $category->slug;
            $menu->type = 'category';
            $menu->table_id = $category->id;
            $menu->sort_order = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d-H:i:s');
            $menu->created_by = 1;
            $menu->save();
        }
        MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
        header("location:index.php?option=menu");
    } else {
        MyClass::set_flash('message', ['msg' => 'Chưa thành công', 'type' => 'danger']);
        header("location:index.php?option=menu");
    }
}

if (isset($_POST['ADDBRAND'])) {
    if (isset($_POST['BrandId'])) {
        $listid = $_POST['BrandId'];
        foreach ($listid as $id) {
            $brand = Brand::find($id);
            $menu = new Menu();
            $menu->name = $brand->name;
            $menu->link = 'index.php?option=brand&cat=' . $brand->slug;
            $menu->type = 'brand';
            $menu->table_id = $brand->id;
            $menu->sort_order = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d-H:i:s');
            $menu->created_by = 1;
            $menu->save();
        }
        MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
        header("location:index.php?option=menu");
    } else {
        MyClass::set_flash('message', ['msg' => 'Chưa thành công', 'type' => 'danger']);
        header("location:index.php?option=menu");
    }
}


if (isset($_POST['ADDTOPIC'])) {
    if (isset($_POST['TopicId'])) {
        $listid = $_POST['TopicId'];
        foreach ($listid as $id) {
            $topic = Topic::find($id);
            $menu = new Menu();
            $menu->name = $topic->name;
            $menu->link = 'index.php?option=topic &cat=' . $topic->slug;
            $menu->type = 'topic ';
            $menu->table_id = $topic->id;
            $menu->sort_order = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d-H:i:s');
            $menu->created_by = 1;
            $menu->save();
        }
        MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
        header("location:index.php?option=menu");
    } else {
        MyClass::set_flash('message', ['msg' => 'Chưa thành công', 'type' => 'danger']);
        header("location:index.php?option=menu");
    }
}


if (isset($_POST['ADDPAGE'])) {
    if (isset($_POST['PageId'])) {
        $listid = $_POST['PageId'];
        foreach ($listid as $id) {
            $page = Post::find($id);
            $menu = new Menu();
            $menu->name = $page->title;
            $menu->link = 'index.php?option=page&cat=' . $page->slug;
            $menu->type = 'page ';
            $menu->table_id = $page->id;
            $menu->sort_order = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->created_at = date('Y-m-d-H:i:s');
            $menu->created_by = 1;
            $menu->save();
        }
        MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
        header("location:index.php?option=menu");
    } else {
        MyClass::set_flash('message', ['msg' => 'Chưa thành công', 'type' => 'danger']);
        header("location:index.php?option=menu");
    }
}
if (isset($_POST['ADDCUSTOM'])) {
    if (strlen($_POST['name']) > 0 && strlen($_POST['link']) > 0) {
        $menu = new Menu();
        $menu->name = $_POST['name'];
        $menu->link = $_POST['link'];
        $menu->type = 'custom';
        $menu->sort_order = 1;
        $menu->status = 2;
        $menu->position = $_POST['position'];
        $menu->parent_id = 0;
        $menu->created_at = date('Y-m-d-H:i:s');
        $menu->created_by = 1;
        $menu->save();
        MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
        header("location:index.php?option=menu");
    } else {
        MyClass::set_flash('message', ['msg' => 'Chưa đủ thông tin', 'type' => 'danger']);
        header("location:index.php?option=menu");
    }
}

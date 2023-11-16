<?php

use App\Models\Topic;

$id = $_REQUEST['id'];
$topic = Topic::find($id);
if ($topic == null) {
    header("location:index.php?option=topic");
}
$topic->status = 0;
$topic->updated_at = date('Y-m-d H:i:s');
$topic->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$topic->save();
header("location:index.php?option=topic");

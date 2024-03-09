<?php
include('admin/dbcon.php');
$get_id = $_POST['id'];
mysqli_query($conn,"delete from parent_class  where  parent_class_id = '$get_id' ")or die(mysqli_error());
mysqli_query($conn,"delete from parent_class_student  where  parent_class_id = '$get_id' ")or die(mysqli_error());
header('location:dashboard_parent.php');
?>
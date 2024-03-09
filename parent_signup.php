<?php
include('admin/dbcon.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$student_un = $_POST['student_un'];


$query = mysqli_query($conn,"select * from parent where  firstname='$firstname' and lastname='$lastname' and student_un='$student_un'")or die(mysqli_error());
$row = mysqli_fetch_array($query);
$id = $row['parent_id'];

$count = mysqli_num_rows($query);
if ($count > 0){
	mysqli_query($conn,"update parent set username='$username',password = '$password', parent_status = 'Registered' where parent_id = '$id'")or die(mysqli_error());
	$_SESSION['id']=$id;
	echo 'true';
}else{
	echo 'false';
}
?>
<?php
include('dbcon.php');
$session_id = $_POST['session_id'];
$subject_id = $_POST['subject_id'];
$class_id = $_POST['class_id'];
$school_year = $_POST['school_year'];
$query = mysqli_query($conn,"select * from parent_class where subject_id = '$subject_id' and class_id = '$class_id' and parent_id = '$session_id' and school_year = '$school_year' ")or die(mysqli_error());
$count = mysqli_num_rows($query);
if ($count > 0){ 
echo "true";
}else{

mysqli_query($conn,"insert into parent_class (parent_id,subject_id,class_id,thumbnails,school_year) values('$session_id','$subject_id','$class_id','admin/uploads/thumbnails.jpg','$school_year')")or die(mysqli_error());

$parent_class = mysqli_query($conn,"select * from parent_class order by parent_class_id DESC")or die(mysqli_error());
$parent_row = mysqli_fetch_array($parent_class);
$parent_id = $parent_row['parent_class_id'];


$insert_query = mysqli_query($conn,"select * from student where class_id = '$class_id'")or die(mysqli_error());
while($row = mysqli_fetch_array($insert_query)){
$id = $row['student_id'];
mysqli_query($conn,"insert into parent_class_student (parent_id,student_id,parent_class_id) value('$session_id','$id','$parent_id')")or die(mysqli_error());
echo "yes";
}
}
?>
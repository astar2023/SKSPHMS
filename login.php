<?php
		include('admin/dbcon.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		/* student */
		$query = "SELECT * FROM student WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn, $query) or die(mysqli_error());
		$row = mysqli_fetch_array($result);
		$num_row = mysqli_num_rows($result);
		
		/* teacher */
		$query_teacher = mysqli_query($conn, "SELECT * FROM teacher WHERE username='$username' AND password='$password'") or die(mysqli_error());
		$num_row_teacher = mysqli_num_rows($query_teacher);
		$row_teacher = mysqli_fetch_array($query_teacher);
		
		/* parent */
		$query_parent = mysqli_query($conn, "SELECT * FROM parent WHERE username='$username' AND password='$password'") or die(mysqli_error());
		$num_row_parent = mysqli_num_rows($query_parent);
		$row_parent = mysqli_fetch_array($query_parent);
		
		if ($num_row > 0) {
			$_SESSION['id'] = $row['student_id'];
			echo 'true_student';
		} else if ($num_row_teacher > 0) {
			$_SESSION['id'] = $row_teacher['teacher_id'];
			echo 'true';
		} else if ($num_row_parent > 0) {
			$_SESSION['id'] = $row_parent['parent_id'];
			echo 'true_parent';
		} else {
			echo 'false';
		}
		
				
		?>
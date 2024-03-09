	 <!-- breadcrumb -->
	<?php $class_query = mysqli_query($conn,"select * from parent_class
	LEFT JOIN class ON class.class_id = parent_class.class_id
	LEFT JOIN subject ON subject.subject_id = parent_class.subject_id
	where parent_class_id = '$get_id'")or die(mysqli_error());
	$class_row = mysqli_fetch_array($class_query);
	?>		
	<ul class="breadcrumb">
		<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
		<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
		<li><a href="#">School Year: <?php echo $class_row['school_year']; ?></a> <span class="divider">/</span></li>
		<li><a href="#"><b>My Child</b></a></li>
	</ul>
	<!-- end breadcrumb -->
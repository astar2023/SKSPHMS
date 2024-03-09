<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('progress_link_student.php'); ?>
                <div class="span4" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
				
										<?php $class_query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_class_id = '$get_id'")or die(mysqli_error());
										$class_row = mysqli_fetch_array($class_query);
										$class_id = $class_row['class_id'];
										$school_year = $class_row['school_year'];
										?>
				
					     <ul class="breadcrumb">
							<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
							<li><a href="#">School Year: <?php echo $class_row['school_year']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><b>Progress</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block" style="width:150%;">
                            <div class="navbar navbar-inner block-header">
							    <div id="" class="muted pull-left"><h4> Homework Progress </h4></div>
							</div>
                            <div class="block-content collapse in">
                                <div class="span12">
										<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
						
										<thead>
										        <tr>
												<th>Date Upload</th>
												<th>Homework</th>
											    <th>Status</th>
												<th>Due date</th>
												<th>Grade</th>
												</tr>
												
										</thead>
										<tbody>
											
                              		<?php
										$query = mysqli_query($conn,"select * FROM student_assignment 
										LEFT JOIN student on student.student_id  = student_assignment.student_id
										RIGHT JOIN assignment on student_assignment.assignment_id  = assignment.assignment_id
										WHERE student_assignment.student_id = '$session_id'
										order by fdatein DESC")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
											$id  = $row['student_assignment_id'];
											$student_id = $row['student_id'];
									?>                              
										<tr>
											<td><?php echo $row['fdatein']; ?></td>
											<td><?php echo $row['fname']; ?></td>
											<td>
  <?php
    $assignment_id = $row['assignment_id'];
    $assignment_query = mysqli_query($conn, "SELECT fdesc FROM student_assignment WHERE assignment_id = '$assignment_id'");
    $assignment_row = mysqli_fetch_array($assignment_query);
    echo $assignment_row['fdesc'];
  ?>
</td>
<td><?php echo $row['fdesc']; ?></td>


											<td>
												<?php if ($session_id == $student_id): ?>
													<span class="badge badge-success"><?php echo $row['grade']; ?></span>
												<?php endif; ?>
											</td>
											<td></td>
										</tr>
                         
										<?php } ?>
						   
                              
										</tbody>
									</table>
						
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
				
				
				
				                <div class="span5" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
				
							
				
					     <ul class="breadcrumb">
		
							<li><a href="#"><b>..</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                       
                        <!-- /block -->
                    </div>


                </div>
				
				<?php /* include('downloadable_sidebar.php') */ ?>
            </div>
		
        </div>
		<?php include('script.php'); ?>
    </body>
</html>
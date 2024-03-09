<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar_parent.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('parent_class_sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
						
						<?php include('my_child_breadcrums.php'); ?>
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right">
								<?php 
								$my_child = mysqli_query($conn, "SELECT parent_class_student.parent_class_student_id, student.firstname, student.lastname
                                FROM parent_class_student
                                INNER JOIN student ON student.student_id = parent_class_student.student_id
                                INNER JOIN parent ON parent.student_un = student.username
                                WHERE parent_class_student.parent_class_id = '$get_id'
                                ORDER BY student.lastname") or die(mysqli_error($conn));



								$count_my_child = mysqli_num_rows($my_child);?>
								Number of Child: <span class="badge badge-info"><?php echo $count_my_child; ?></span>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<ul	 id="da-thumbs" class="da-thumbs">
										    <?php
														$my_child = mysqli_query($conn, "SELECT parent_class_student.parent_class_student_id, student.firstname, student.lastname
														FROM parent_class_student
														INNER JOIN student ON student.student_id = parent_class_student.student_id
														INNER JOIN parent ON parent.student_un = student.username
														WHERE parent_class_student.parent_class_id = '$get_id'
														ORDER BY student.lastname") or die(mysqli_error($conn));
						
						
						
														while($row = mysqli_fetch_array($my_child)){
														$id = $row['parent_class_student_id'];
														?>
											<li id="del<?php echo $id; ?>">
													<a href="#">
													<img id="student_avatar_class" src="admin/<?php echo isset($row['location']) ? $row['location'] : '' ?>" width="124" height="140" class="img-polaroid">

														<div>
														<span>
														<p><?php ?></p>
														
														</span>
														</div>
													</a>
											
													<p class="class"><?php echo $row['firstname']; ?></p>
													<p class="subject"><?php echo $row['lastname'];?></p>
													<a  href="#<?php echo $id; ?>" data-toggle="modal"><i class="icon-trash"></i> Remove</a>	
											</li>
											<?php include("remove_student_modal.php"); ?>
											<?php } ?>
									</ul>
												<script type="text/javascript">
													$(document).ready( function() {
														$('.remove').click( function() {
														var id = $(this).attr("id");
															$.ajax({
															type: "POST",
															url: "remove_student.php",
															data: ({id: id}),
															cache: false,
															success: function(html){
																$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
																$('#'+id).modal('hide');
																$.jGrowl("Your Student is Successfully Remove", { header: 'Student Remove' });
															}
															}); 	
															return false;
														});				
													});
												</script>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>
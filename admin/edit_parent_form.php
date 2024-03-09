  <div class="row-fluid">
       <a href="parent.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Parent</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit Parent</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
								<!--
										<label>Photo:</label>
										<div class="control-group">
                                          <div class="controls">
                                               <input class="input-file uniform_on" id="fileInput" type="file" required>
                                          </div>
                                        </div>
									-->	
									<?php
									$query = mysqli_query($conn,"select * from parent where parent_id = '$get_id' ")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
									<div class="control-group">
                                          <div class="controls">
                                            <input name="un" class="input focused" id="focusedInput" type="text" placeholder = "ID Number" required>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="student_un" class="input focused" id="focusedInput" type="text" placeholder = "Child ID Number" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['firstname']; ?>" name="firstname" id="focusedInput" type="text" placeholder = "Firstname">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['lastname']; ?>"  name="lastname" id="focusedInput" type="text" placeholder = "Lastname">
                                          </div>
                                        </div>
										
										
									
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
				   <?php
                            if (isset($_POST['update'])) {
                       
                                $username = $_POST['un'];
    							$firstname = $_POST['firstname'];
    							$lastname = $_POST['lastname'];
    							$student_un = $_POST['student_un'];
								
								
								$query = mysqli_query($conn,"select * from parent where firstname = '$firstname' and lastname = '$lastname' ")or die(mysqli_error());
								$count = mysqli_num_rows($query);
								
								if ($count > 1){ ?>
								<script>
								alert('Data Already Exist');
								</script>
								<?php
								}else{
								
								mysqli_query($conn,"update parent set firstname = '$firstname' , lastname = '$lastname' , student_un = '$student_un' where parent_id = '$get_id' ")or die(mysqli_error());	
								
								?>
								<script>
							 	window.location = "parent.php"; 
								</script>
								<?php   }} ?>
						 
						 
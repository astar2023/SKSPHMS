     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Parent</div>
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
                                            <input class="input focused" name="firstname" id="focusedInput" type="text" placeholder = "Firstname">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="lastname" id="focusedInput" type="text" placeholder = "Lastname">
                                          </div>
                                        </div>
										
										
									
											<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
                    <?php
if (isset($_POST['save'])) {
    $username = $_POST['un'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $student_un = $_POST['student_un'];

    $query = mysqli_query($conn, "SELECT * FROM parent WHERE firstname = '$firstname' AND lastname = '$lastname'") or die(mysqli_error());
    $count = mysqli_num_rows($query);

    if ($count > 0) { ?>
        <script>
            alert('Data Already Exist');
        </script>
    <?php } else {
        mysqli_query($conn, "INSERT INTO parent (firstname, lastname, location, student_un, username) VALUES ('$firstname', '$lastname', 'uploads/NO-IMAGE-AVAILABLE.jpg', '$student_un', '$username')") or die(mysqli_error());
    ?>
        <script>
            window.location = "parent.php";
        </script>
<?php }
} ?>

						 
						 
						 
						 
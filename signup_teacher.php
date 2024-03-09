<?php include('header.php'); ?>
<style>
	body#login::before {
    content: "";
    background: url(admin/images/bck.jpg);
    background-size: cover !important; 
    position: absolute;
    top: 0;
    /* z-index: 1; */
    left: 0;
    width: 115%;
    height: 115%;
}
</style>
  <body id="login">
    <div class="container" style="position: relative">
	
	<div class="row-fluid">
	<div class="span6">
		<div class="title_index">
			<?php include('title_index.php'); ?>
		</div>
	</div>
	<div class="span6">
		<div class="pull-right">
				<?php include('signup_teacher_form.php'); ?>
		</div>
	</div>
    </div>
	<div class="row-fluid">
		<div class="span12">
			<div class="index-footer">
				<?php include('link.php'); ?>
			</div>
		</div>
	</div>
		   <!-- /container -->
		<?php include('footer.php'); ?>
    </div> <!-- /container -->
<?php include('script.php'); ?>
  </body>
</html>
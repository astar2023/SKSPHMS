<div class="span3" id="sidebar">
	<img id="avatar" class="img-polaroid" src="admin/<?php echo $row['location']; ?>">
	
	<?php include('parent_count.php'); ?>
	<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
		<li class="active"><a href="dashboard_parent.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;My Class</a></li>
		
	</ul>
	<?php include('search_other_class.php'); ?>	
</div>


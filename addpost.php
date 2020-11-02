<?php  
	session_start();
	include 'include/class.user.php';
	$user = new User();
	$uid = $_SESSION['uid'];
	if (!$user->get_session()){
	header("location:login.php");
	exit();
	}

	if (isset($_GET['q'])){
	$user->user_logout();
	header("location:login.php");
	exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Post</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	
	<!-- n -->
	<?php include('include/header.php'); ?>
	

	<div class="container">
	<div style="margin-top: 4%;"></div>
	<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4 well">
	<h2 class="text-center">Add Post</h2>
	<?php 
	// Show any success or error message 
		if(isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	?>
		<form action="include/postadd.php" method="post" name="login">
		<div class="form-group">
		<label>Title:</label>
		<input class="form-control" type="text" name="title" required="" />
		</div>
		<div class="form-group">
		<label>Description:</label>
		<textarea name="description" rows="5" cols="40"></textarea>
		</div>
		<input class="btn btn-primary" type="submit" name="addpost" value="Add" />		
		</form>
	<br>
	
	</div>
	<div class="col-sm-4"></div>
	</div> <!-- End row -->
	</div> <!-- End container -->

</body>
</html>
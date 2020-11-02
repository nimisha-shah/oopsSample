<?php 
	// filename: include/register.php
	session_start(); 
	//n
	//echo "test";exit;
	include 'class.post.php';
	$post = new Post(); // Checking for user logged in or not

	if (isset($_REQUEST['addpost'])){
	extract($_REQUEST);
	$createpost = $post->add_post($title, $description);
	if ($createpost) {
	// Registration Success
	// echo 'Registration successful <a href="login.php">Click here</a> to login';
		$_SESSION['msg'] = '<div class="alert alert-success alert-dismissable">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Success</strong>! Post added successfully.
	</div>';
		header("location: ../addpost.php");
		exit();

	} else {
	// No post added	
		$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissable">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Sorry something went wrong</strong>
	</div>';
		header("location: ../addpost.php");
		exit();
	}
	}
?>
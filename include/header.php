<div class="jumbotron text-center">

  <div class="row">	
  <div class="col-md-6">
	<p>Hello <small><?php $user->get_fullname($uid); ?>!</small></p>
  </div>
  <div class="col-md-6 mt-5">
 <a class="btn btn-primary btn-md" href="home.php?q=logout">LOGOUT</a>
  </div>
  </div>

  <div class="row">	  
  	 <div class="col-md-6 ml-3">
	<p><a href="listpost.php">All Posts</a></p>  
		</div>
  </div>


</div>


<!-- <div class="jumbotron text-center">
<h2>Hello <small><?php //$user->get_fullname($uid); ?>!</small></h2>

	
<a class="btn btn-primary btn-md" href="home.php?q=logout">LOGOUT</a>

	</div> -->
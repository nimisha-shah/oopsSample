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
	

	 <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">All Posts</h2>
                        <a href="addpost.php" class="btn btn-success pull-right">Add Post</a>
                    </div>
                    <?php
                    // Include config file
                    //require_once "config.php";
                    
                    // Attempt select query execution
                    include 'include/class.post.php';
					$post = new Post();
                    $allpostlist = $post->get_allpost();
                    
                        if($allpostlist != ''){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Title</th>";
                                        echo "<th>Description</th>";
                                        echo "<th>Like</th>";        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                $i=1;
                                while($row = mysqli_fetch_assoc($allpostlist)){
                                    echo "<tr>";
                                       echo "<td>" . $i . "</td>";
                                        echo "<td>" . $row['title'] . "</td>";
                                        echo "<td>" . $row['description'] . "</td>";

                                        if($uid != $row['userid']){
                                        echo '
                <td class="likecls"'.$row['id'].'"><input type="button" value="Like" id="like" class="likechange" data-id="'.$row['id'].'" style="color: rgb(255, 164, 73);">( <span id="totlikes'.$row['id'].'">'.$row['likes'].'</span> )</td>';
                }else{
                    echo  '<td>( <span id="totlikes'.$row['id'].'">'.$row['likes'].'</span> )</td>';
                }                                      
                                        echo "<td>";
                                        echo "</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                           // $result->free();
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                                      
                    
                    ?>
                </div>
            </div>        
        </div>
    </div>

</body>
</html>
<script type="text/javascript">
  $(document).ready(function() {
       $(".likechange").click(function(){
        var thisOb = $(this);
        var id = thisOb.attr('data-id');
         
        if(id != ''){
              
            $.ajax({
                type: "POST",      
                //url: "ajax.php?action=bidsPay&campId="+campaignId+"&allId="+bidId+"&numberofbids="+numberofbids,
                url: "ajax.php?action=addLike&id="+id,
                data: 0,
                dataType: 'json',
                success: function(data){
                    //alert(data.status);
                  if (data.status == 1) {                      
                      $('#totlikes'+data.id).html(data.likes);
                  } 
                  else{

                  }                
               }
              });
          }
             
        });
  });
</script>

<?php  
	include_once('connection.php');

	class Post{
		public $db;

		//Add Post:
		public function add_post($title,$description){
			$conn = db();
		
			//Insert Post:	
			$usersession = $_SESSION['uid'];
			$sql="INSERT INTO posts SET userid='$usersession',title='$title', description='$description'";
			$result = $conn->query($sql);
			return $result;	
		}

		// show the username or fullname 
		public function get_allpost()
		{
			$conn = db();
			$sql="SELECT * FROM posts";
			$result = $conn->query($sql);
			//$user_data = mysqli_fetch_assoc($result);			
			$totrows = mysqli_num_rows($result);
			if($totrows > 0){
				return $result;
			}else{				
				return '';
			}
			//echo $user_data['fullname'];
		}		

		public function getpostbyid($id){			
			$conn = db();
			$sql="SELECT id,likes FROM posts WHERE id='".$id."'";
			$result = $conn->query($sql);
			$user_data = $result->fetch_assoc();
			return $user_data;
		}

		public function updateLikesByid($id,$like){			
			$conn = db();
			$sql="UPDATE posts SET likes='".$like."' WHERE id='".$id."'";
			$result = $conn->query($sql);						
		}


	}

	?>
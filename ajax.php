<?php
session_start();
include 'include/class.post.php';
$post = new Post();

function getValue($key){	
	$value = (isset($_REQUEST[$key]))?$_REQUEST[$key]:"";
	return htmlspecialchars(trim($value));
	//return mysqli_real_escape_string($con,trim($value));
}

$section = getValue('action');
switch ($section){

	case 'addLike':
	{ 
		$id = getValue("id");

		if($id != ''){			
				
			$likeValue = $post->getpostbyid($id);
			$finalLike = $likeValue['likes'] + 1;

			$post->updateLikesByid($id,$finalLike);

				echo json_encode(array('status'=>'1','message' => 'successfull','id' => $id,'likes'=>$finalLike));	
			
		}else{
			echo json_encode(array('status'=>'0','message' => 'Id not found'));	
		}
		break;
		
	}	
}


?>
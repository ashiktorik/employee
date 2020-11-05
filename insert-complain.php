<!-- <?php 
session_start();
$mysqli = new mysqli("localhost", "root", "", "test");
if(isset($_SESSION['user_role'] ) && $_SESSION['user_role'] !='admin')
{
header("location:login.php");
die();
}

include 'includes/conn.php';

if(isset($_POST['send']))
{
    
    echo $name  = $mysqli->real_escape_string($_POST['user']);
	echo $dpid = $mysqli->real_escape_string($_POST['dpid']);
	echo $subject = $mysqli->real_escape_string($_POST['subject']);
	echo $text = $mysqli->real_escape_string($_POST['text']);
	echo $avatar_path = $mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);
	//$avatar_path = ('images/'.$_FILES['name']);

	 //make sure the file type is image
	if (preg_match("!image!",$_FILES['avatar']['type'])) {

		//copy image to images/ folder
		if (copy($_FILES['avatar']['tmp_name'], $avatar_path)){

			//insert user data into database
			// $sql = "INSERT INTO login ( name, email, password, avatar) "
			// 	. "VALUES ('$name', '$email', '$password', '$avatar_path')";
			//if the query is successsful
		}
		else {
		$_SESSION['message'] = 'File upload failed!';
		}
	}
	else {
	$_SESSION['message'] = 'Please only upload GIF, JPG or PNG images!';
	}
	$q="INSERT INTO complain ( username, dpid, subject, text, file_comp) VALUES ('$name','$dpid','$subject','$text','$avatar_path')";
	
		if ($conn->query($q) === TRUE) {
			$last_id = $conn->insert_id;
			echo "Complain sent" . $last_id;
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
}

?> -->
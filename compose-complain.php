<?php 
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "", "test");
// if($_SESSION['user_role'])
// {
// header("location:home.php");
// die();
// }

include 'includes/conn.php';
if(isset($_POST['send']))
{
    
    $name  = $mysqli->real_escape_string($_POST['user']);
    $dpid = $mysqli->real_escape_string($_POST['dpid']);
	$subject = $mysqli->real_escape_string($_POST['subject']);
	$text = $mysqli->real_escape_string($_POST['text']);
	$avatar_path = $mysqli->real_escape_string('report-file/'.$_FILES['avatar']['name']);
	//$avatar_path = ('images/'.$_FILES['name']);

	 //make sure the file type is image
	if (preg_match("!image!",$_FILES['avatar']['type'])) {

		//copy image to images/ folder
		if (copy($_FILES['avatar']['tmp_name'], $avatar_path)){

			//if the query is successsful
		}
		else {
		$_SESSION['message'] = "<script type='text/javascript'>alert('File upload failed');</script>";
		}
	}
	else {
	$_SESSION['message'] = "<script type='text/javascript'>alert('Please only upload GIF, JPG or PNG images!');</script>";
    }
    //insert user data into database
	$q="INSERT INTO complain ( username, dpid, subject, text, file_comp) VALUES ('$name','$dpid','$subject','$text','$avatar_path')";

    if ($conn->query($q) === TRUE) {
        $_SESSION['message'] = "<script type='text/javascript'>alert('Complain Sent Successfully');</script>";
        header("location:compose-complain.php");
    }
    else {
        $_SESSION['message'] = "<script type='text/javascript'>alert('Massage could note sent!');</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <?php
    include 'includes/link-head.php';
    ?>

</head>

<body>
<main>
    <div class="public_helper">
            <div class="container_fluid top_container">
        <div class="col-lg-6 m-auto">
            <form class="form" action="compose-complain.php" method="post" enctype="multipart/form-data">
                <!-- <form method="post"> -->
                <br>
                <div>
                    <div class="card-header">
                        <h1 class="text-white text-center">Complain Box</h1>
                    </div><br>


                    <label>Name</label>
                    <input type="text" name="user" class="form-control" required>
                    <?php
                            if(!$_SESSION['username']);{ ?>
                    <div class="">
                        <input type="hidden" name="dpid" class="form-control"
                            value="<?php echo $_SESSION['username'];?>">
                    </div>
                    <?php } ?>

                    <label>Subject</label>
                    <input type="text" name="subject" class="form-control" required>

                    <label>What is the complain?</label>
                    <textarea type="text" name="text" class="form-control" required> </textarea>
                </div>
                <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar"
                        accept="image/*" />
                </div>
                <div class="row m-auto">
                    <div class="col-md-5">
                        <input type="submit" value="send" name="send" class="btn btn-block btn-primary" href="#" />
                        <p><?php
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
   
}
unset( $_SESSION['message'] );

?></p>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
</main>
</body>
</html>
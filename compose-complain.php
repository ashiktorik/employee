<?php 
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "", "test");
if(!$_SESSION['username'])
{
header("location:emp-login.php");
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

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"
        integrity="sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous">
    </script>
    <!--local:link_-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="assets/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
    </script>
    <script src="assets/js/bootstrap.bundle.min.js"
        integrity="sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous">
    </script>
    <?php
    include "includes/emp-header.php";
    ?>
</head>

<body>

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
                    <input type="hidden" name="dpid" class="form-control" value="<?php echo $_SESSION['username'];?>">
                </div>
                <?php } ?>

                <label>Subject</label>
                <input type="text" name="subject" class="form-control" required>

                <label>What is the complain?</label>
                <textarea type="text" name="text" class="form-control" required> </textarea>
            </div>
            <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" />
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
</body>

</html>
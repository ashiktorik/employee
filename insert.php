<?php 
session_start();
error_reporting(0);
include ('includes/conn.php');
$mysqli = new mysqli("localhost", "root", "", "test");
if(isset($_SESSION['user_role'] ) && $_SESSION['user_role'] !='admin')
{
header("location:login.php");
die();
}

if(isset($_POST['done']))
{
    $first_name  = ucfirst($_POST['first_name']);
    $last_name  = ucfirst($_POST['last_name']);
    $username  = ucfirst($_POST['username']);
    $pass = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
	$salary = $_POST['salary'];
	$qualification = ucfirst($_POST['qualification']);
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
	$date = "$day-$month-$year";
	$day1 = $_POST['day1'];
    $month1 = $_POST['month1'];
    $year1 = $_POST['year1'];
	$date1 = "$day1-$month1-$year1";
	$dob = date("Y-m-d",strtotime($date));
	$doj = date("Y-m-d",strtotime($date1));
	$date_of_birth = $dob;
	$date_of_join = $doj;
	$avatar_path = $mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);
	//$avatar_path = ('images/'.$_FILES['name']);

	 //make sure the file type is image
	if (preg_match("!image!",$_FILES['avatar']['type'])) {

		//copy image to images/ folder
		if (copy($_FILES['avatar']['tmp_name'], $avatar_path)){


			//insert user data into database
            $q_u = "SELECT * FROM tblemployees WHERE name = '$username'";
              $res_u = mysqli_query($mysqli, $q_u) or die (mysqli_error($mysqli));
                if (mysqli_num_rows($res_u) > 0){
                    header("refresh:0");
                    $_SESSION['message'] = "<font color:red>Sorry Username is not Available</font>";}
                        else{
            //if the query is successsful!
          echo  $q="INSERT INTO `tblemployees`(`name`, `first_name`, `last_name`, `password`, `age`, `gender`, `salary`, `date_of_birth`, `date_of_join`, `qualification`,`avatar`) VALUES ('$username','$first_name','$last_name','$pass','$age','$gender','$salary','$date_of_birth','$date_of_join','$qualification','$avatar_path')";

            if ($conn->query($q) === TRUE) {
                $_SESSION['message'] = "Employee added successfully";
                header("refresh:0");
                header("location:insert.php");
            }
            else {
                $_SESSION['message'] = "Employee Could not added!";
            }
        }
        }
			else {
                $_SESSION['message'] = "File upload failed";
                }
            }
            else {
            $_SESSION['message'] = "Please only upload GIF, JPG or PNG images!";
            }
}

?>


<!DOCTYPE html>
<html>

<head>
    <?php
include 'includes/link-head.php';
include 'includes/header.php';
    ?>
</head>

<body>
    <main>
        <div class="helper">
            <div class="container_fluid top_container">
                <div class="col-lg-6 m-auto">
                    <form class="form" method="post" enctype="multipart/form-data">
                        <!-- <form method="post"> -->
                        <br>
                        <div>
                            <div class="card-header">
                                <h1 class="text-white text-center">Insert Employee Details</h1>
                            </div>
                            <div class="alert" style="background:#0a9c64"><?= $_SESSION['message'] ?></div>
                            <script>
                                setTimeout(function () {
                                    let alert = document.querySelector(".alert");
                                    alert.remove();
                                }, 3000);
                            </script>
                            <div class="form-control">
                                <label>Dpid/Username</label>
                                <input type="email" name="username" class="form-control" required
                                    placeholder="Please Do not use space">
                            </div>

                            <div class="row">
                                <div class="col-6 form-control">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" class="form-control" required><br>
                                </div>
                                <div class="col-6 form-control">

                                    <label>Last Name</label>
                                    <input type="text" name="last_name" class="form-control" required><br>
                                </div>
                            </div>

                            <div class="form-control">
                                <label>New Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>

                            <div class="row">
                                <div class="form-control col-6">
                                    <label>age</label>
                                    <input type="text" name="age" class="form-control" required pattern="[0-9]{1,15}"
                                        title="this field accepts only numbers">
                                </div>


                                <div class="form-control col-6">
                                    <label>Gender</label>
                                    <select class="selectpicker form-control" name="gender" required>
                                        <option class="form-cotrol" value="male" checked>Male</option>
                                        <option class="form-cotrol" value="female" checked>Female</option>
                                        <option class="form-cotrol" value="other" checked>Other</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-control col-6">
                                    <label>salary</label>
                                    <input type="text" name="salary" class="form-control" required pattern="[0-9]{1,15}"
                                        title="this field accepts only numbers">
                                </div>

                                <div class="form-control col-6">
                                    <label>qualification</label>
                                    <input type="text" name="qualification" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 form-control">
                                    <label>date of Birth</label>
                                    <div class="row" style="display:flex;flex-wrap: nowrap;">
                                        <input type="text" name="day" class="form-control" placeholder="Day" required
                                            pattern="[0-9]{1,2}"
                                            title="this field accepts only numbers  and two characters">

                                        <input type="text" name="month" class="form-control" placeholder="month"
                                            required pattern="[0-9]{1,2}"
                                            title="this field accepts only numbers  and two characters">

                                        <input type="text" name="year" class="form-control" placeholder="year" required
                                            pattern="[0-9]{4,4}"
                                            title="this field accepts only numbers  and 4 characters">
                                    </div>
                                </div>

                                <div class="col-6 form-control">
                                    <label>date of Joining</label>
                                    <div class="row" style="display:flex;flex-wrap: nowrap;">
                                        <input type="text" name="day1" class="form-control" placeholder="Day" required
                                            pattern="[0-9]{1,2}"
                                            title="this field accepts only numbers  and two characters">


                                        <input type="text" name="month1" class="form-control" placeholder="month"
                                            required pattern="[0-9]{1,2}"
                                            title="this field accepts only numbers  and two characters">


                                        <input type="text" name="year1" class="form-control" placeholder="year" required
                                            pattern="[0-9]{4,4}"
                                            title="this field accepts only numbers  and 4 characters">

                                    </div>
                                </div>
                            </div>



                            <div class="avatar form-control"><label>Select your avatar: </label><input type="file"
                                    name="avatar" accept="image/*" required /></div><br>
                            <div class="row m-auto">
                                <div class="col-md-5">

                                    <!-- <button class="btn btn-success col-lg-12" name="done">Add</button> -->
                                    <input type="submit" value="Register" name="done" class="btn btn-block btn-primary"
                                        href="display.php"/></div>
                                <div class="col-md-5">
                                <a href="../dashboard.php"><input type="button" name=""
                                            value="Back to records" class="btn btn-danger col-lg-12"></a>
                                            </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
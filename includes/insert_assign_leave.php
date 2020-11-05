<?php 
session_start();
$mysqli = new mysqli("localhost", "root", "", "test");
if(isset($_SESSION['user_role'] ) && $_SESSION['user_role'] !='admin')
{
header("location:login.php");
die();
}

include 'conn.php';

if(isset($_POST['submit']))
{
    $task_name  = $mysqli->real_escape_string($_POST['name']);
    $valid_from = $mysqli->real_escape_string ( $_POST['valid_from']);
	$valid_to = $mysqli->real_escape_string ( $_POST['valid_to']);
    $earn_leave = $mysqli->real_escape_string ($_POST['earn_leave']);
    $medical_leave = $mysqli->real_escape_string ($_POST['medical_leave']);
    $casual_leave = $mysqli->real_escape_string ($_POST['casual_leave']);
    $assigned_by = $mysqli->real_escape_string($_POST['assigned_by']);
	$emp_list = $_POST['emp']; 
    print_r($emp_list);

if(is_array($emp_list)){
   foreach ($emp_list as $emp_list){

	echo $q = "INSERT INTO tblleaves ( assign_to, valid_from, valid_to, earn_leave, medical_leave, casual_leave, assigned_by)"
   . "VALUES ('$emp_list', '$valid_from', '$valid_to','$earn_leave','$medical_leave','$casual_leave','$assigned_by')";

   
   if ($conn->query($q) === TRUE){
        header("location:../assign-leave.php?message=<div class='alert alert-success'>Leave assigned</div>");
    }
    else {
        header("location:../assign-leave.php?message=<div class='alert alert-denger'>Leave could not assignged!</div>");
    }
}
}
}

?>

<!DOCTYPE html>
<html>

<body>

</body>

</html>
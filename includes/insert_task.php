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
	$end_date = $mysqli->real_escape_string ( $_POST['datecount']);
	$end_time = $mysqli->real_escape_string ( $_POST['timecount']);
	$task_details = $mysqli->real_escape_string ($_POST['description']);
    $assigned_by = $mysqli->real_escape_string($_POST['assigned_by']);
	$emp_list = $_POST['emp']; 
    print_r($emp_list);

if(is_array($emp_list)){
   foreach ($emp_list as $emp_list){

	$q = "INSERT INTO task ( task_name, user_id, end_date, end_time, task_details, assigned_by)"
   . "VALUES ('$task_name', '$emp_list', '$end_date', '$end_time','$task_details','$assigned_by')";

   
   if ($conn->query($q) === TRUE){
    header("location:../task.php?message=<div class='alert alert-success'>Task assignged</div>");
    }
    else {
        header("location:../task.php?message=<div class='alert alert-denger'>Task could not assignged!</div>");
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
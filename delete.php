<?php
session_start();
if(isset($_SESSION['user_role'] ) && $_SESSION['user_role'] !='admin')
{
header("location:login.php");
die();
}

include 'includes/conn.php';
?>



<!---- Delete Employee--------->
<?php
$id = $_SESSION['id'] ;
$q = " DELETE FROM tblemployees WHERE id = $id";
mysqli_query($conn,$q);
header("location:dashboard.php");
?>



<!---- Delete task--------->
<?php
$id = $_SESSION['id'] ;
$q = " DELETE FROM task WHERE id = $id";
mysqli_query($conn,$q);
header("location:dashboard.php");
?>



<!---- Delete complain--------->
<?php
$id = $_SESSION['id'] ;
$q = " DELETE FROM task WHERE id = $id";
mysqli_query($conn,$q);
header("location:dashboard.php");
?>
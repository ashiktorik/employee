<?php
session_start();
if(isset($_SESSION['user_role'] ) && $_SESSION['user_role'] !='admin')
{
header("location:login.php");
die();
}

include 'includes/conn.php';

$id = $_SESSION['id'] ;

$q = "DELETE FROM complain WHERE id= $id";

mysqli_query($conn,$q);{

header("location:dashboard.php");
?>
<img src="<?php echo $role; ?>">
<?php }
?>

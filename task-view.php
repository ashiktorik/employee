<?php
session_start();
error_reporting(0);
include('includes/conn.php');
if(!$_SESSION['username'])
    {   
        echo ($_SESSION['username']);
header('location:index.php');
}
else
{
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <?php
    include 'includes/link-head.php';
    include "includes/emp-header.php";
    include "includes/header.php";
    ?>
</head>

<body>

    <div class="col-lg-6 m-auto">
        <br>
        <div><?php
        error_reporting(0);
include 'includes/conn.php';

$id = $_GET['id'];
$name = ucfirst($_POST['name']);

$q="select * from task where id = $id";
$query = mysqli_query($conn,$q);
$res=mysqli_fetch_array($query);{

?>
            <div class="card-header">
                <h1 class="text-white text-center">Displaying Task Details</h1>
            </div><br>
            <div class="complain_view_outer">
                <div class="complainview complainview_left"><label>Task ID</label>
                </div>
                <div class="complainview complainview_right">
                <?php echo $res['id']; ?>
                </div>
            </div>
            <div class="complain_view_outer">
                <div class="complainview complainview_left"><label>Task Name</label>
                </div>
                <div class="complainview complainview_right">
                    <?php echo $res['task_name']; ?>
                </div>
            </div>
            <div class="complain_view_outer complain_view_outer_mid">
                <div class="complainview complainview_left"><label>Deadline</label>
                </div>
                <div class="complainview complainview_right">
                <?php echo $res['end_date']; ?><bspn>at <?php echo $res['end_time']; ?>
                </div>
            </div>
            <div class="complain_view_outer">
                <div class="complainview complainview_left"><label>Task Details</label>
                </div>
                <div class="complainview complainview_right">
                <?php echo $res['task_details']; ?>
                </div>
            </div>
            <div class="complain_view_outer complain_view_outer_end">
                <div class="complainview complainview_left"><label>Document</label>
                </div>
                <div class="complainview complainview_right"><img style="max-width: 200px;"
                src="<?php echo $res['file_comp']; ?>" >
                </div>
            </div>
            <br>
            <?php
		if($_SESSION ['user_role'] == 'admin'){
			?>
		<a href="insert.php" name="insert"><input type="button" name="" value="Edit Task"
                    class="btn btn-primary col-lg-12">
		</a>
		<?php } ?>
            <a href="dashboard.php"><input type="button" name="" value="Back"
                    class="btn btn-primary col-lg-12"></a>
                <?php } ?>
        </div>
    </div>
</body>
                <?php } ?>
</html>
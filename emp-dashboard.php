<?php
include('includes/conn.php');
session_start();
// if(!$_SESSION['username'])
//     {   
// header('location:emp-dashboard.php');
// }
// else{
//     header('location:emp-login.php');
// }
if(isset($_SESSION['user_role'] ) && $_SESSION['user_role'] !='employee')
{
    echo $_SESSION['user_role'] ;
header("location:emp-login.php");
}
if (($_SESSION['user_role'] ) && $_SESSION['user_role'] =='hr') {
    header("location:displayhr.php");

die();
}
{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <?php 
    include 'includes/link-head.php';
    include 'includes/emp-header.php';?>
</head>

<body>
    <main>
        <div class="helper">
            <div class="container_fluid top_container">
                <div class="container_fluid">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-title-holder">
                                            <h3>New Task</h3>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <table class="table table-stripped table-hover table-bordered">
                                            <tr class="text-dark">
                                                <th>
                                                    <h5>Task Name</h5>
                                                </th>
                                                <th>
                                                    <h5>Start At</h5>
                                                </th>
                                                <th>
                                                    <h5>End Date</h5>
                                                </th>
                                                <th>
                                                    <h5>Action</h5>
                                                </th>
                                            </tr>


                                            <?php
include 'includes/conn.php';
if(!$_SESSION['id']);
$id = $_SESSION['id'];
$q="select * from task where user_id = $id";
$query = mysqli_query($conn,$q);
while ($res = mysqli_fetch_array($query)) {
?>

                                            <tr>
                                                <th><?php echo $res['task_name'] ?></th>
                                                <th><?php echo $res['create_date'] ?></th>
                                                <th><?php echo $res['end_date'] ?></th>
                                                <th><a href="emp-task-view.php?id=<?php echo $res['id']; ?>"
                                                        class="text-white"><button
                                                            class="btn btn-success">View</button></a>
                                                </th>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-title-holder">
                                            <h3>Notice</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <table class="table table-stripped table-hover table-bordered">
                                            <tr class="text-dark">
                                                <th>
                                                    <h5>Notice</h5>
                                                </th>
                                                <th>
                                                    <h5>Notice Date</h5>
                                                </th>
                                                <th>
                                                    <h5>Action</h5>
                                                </th>
                                            </tr>


                                            <?php
include 'includes/conn.php';
$id = $_SESSION['id'];
$q="select * from notice ";
$query = mysqli_query($conn,$q);
while ($res = mysqli_fetch_array($query)) {
?>

                                            <tr>
                                                <th><?php echo $res['notice_type'] ?></th>
                                                <th><?php echo $res['notice_time'] ?></th>
                                                <th><a href="notice-view.php?id=<?php echo $res['notice_id']; ?>"
                                                        class="text-white"><button
                                                            class="btn btn-success">View</button></a>
                                                </th>
                                            </tr>

                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
<?php } ?>
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
    ?>
</head>

<body>

    <div class="col-lg-6 m-auto">
        <br>
        <div><?php
        error_reporting(0);
include 'includes/conn.php';

$id = $_GET['id'];

$q="select * from notice where notice_id = $id";
$query = mysqli_query($conn,$q);
$res=mysqli_fetch_array($query);{

?>
            <div class="card-header">
                <h1 class="text-white text-center">Displaying Notice</h1>
            </div><br>
            <div class="complain_view_outer">
                <div class="tableview tableview_right">
                <b>Notice Number</b> &nbsp; <?php echo $res['notice_id']; ?>
                </div>
            </div>
            <div class="complain_view_outer complain_view_outer_mid">
                <div class="tableview tableview_right"><b>Date</b> &nbsp; 
                <?php echo $res['notice_time'];?>
                </div>
            </div>

            <div class="complain_view_outer">
                <div class="tableview tableview_right">
                <b>Notice Type</b> &nbsp; <?php echo $res['notice_type']; ?>
                </div>
            </div>
        
            <div class="complain_view_outer">
                <div class="tableview tableview_right">
                <?php echo $res['notice_details']; ?>
                </div>
            </div>
            <div class="complain_view_outer complain_view_outer_end">
                <div class="tableview tableview_right"><b>Notice By</b> &nbsp; <br><?php echo $res['notice_by']; ?>
                </div>
            </div>
            <br>
            <a href="emp-dashboard.php"><input type="button" name="" value="Back"
                    class="btn btn-primary col-lg-12"></a>
                <?php } ?>
        </div>
    </div>
</body>
                <?php } ?>
</html>
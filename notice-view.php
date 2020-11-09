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
    <main>
        <div class="helper">
            <div class="container_fluid top_container">
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
                        </div>

                        <div class="row">
                            <div class="tableview tableview_right col-3">
                                <h5>Notice Number</h5>
                            </div>
                            <div class="tableview tableview_left col-9">
                               <?php echo $res['notice_id']; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="tableview tableview_right col-3"><h5>Date</h5>
                            </div>
                            <div class="tableview tableview_left col-9"><?php echo $res['notice_time'];?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="tableview tableview_right col-3">
                                <h5>Notice Type</h5>
                            </div>
                            <div class="tableview tableview_left col-9">
                                <?php echo $res['notice_type']; ?>
                            </div>
                        </div>

                        <div class="row">
                        <div class="tableview tableview_right col-3">
                                <h5>Notice Details</h5>
                            </div>
                            <div class="tableview tableview_left col-9">
                                <?php echo $res['notice_details']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="tableview tableview_right col-3"><h5>Notice By</h5> 
                            </div>
                            <div class="tableview tableview_left col-9"><?php echo $res['notice_by']; ?>
                            </div>
                        </div>
                        <a href="emp-dashboard.php"><input type="button" name="" value="Back"
                                class="btn btn-primary col-lg-12"></a>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>
</body>

</html>
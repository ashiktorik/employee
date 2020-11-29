<?php
session_start();
error_reporting(0);
include('includes/conn.php');
if(!$_SESSION['name'])
    {   
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
		if(!$_SESSION ['user_role'] == 'admin') {

            include "includes/emp-header.php"; }
            else{
                include "includes/header.php";
            } 
    ?>       


</head>

<body>
    <main>
        <div class="helper">
            <div class="container_fluid top_container">
                <div class="col-lg-6 m-auto">
                <div>
                        <?php
        error_reporting(0);
include 'includes/conn.php';

$id = $_GET['id'];
//$name = ucfirst($_POST['name']);

$q="select * from task where id = $id";
$query = mysqli_query($conn,$q);
$res=mysqli_fetch_array($query); {

?>
                        <div class="card-header">
                            <h1 class="text-white text-center">Displaying Task Details</h1>
                        </div>
                        <form method="post">
                        <div class="complain_view_outer ">
                            <div class="complainview complainview_left"><label>Task ID</label>
                            </div>
                            <div class="complainview complainview_right">
                                <input type="text" name="id" class="form-control" value="<?php echo $res['id']; ?>" readonly>
                            </div>
                        </div>
                        <div class="complain_view_outer">
                            <div class="complainview complainview_left"><label>Task Name</label>
                            </div>
                            <div class="complainview complainview_right">
                                <input type="text" name="task_name"
                                    class="form-control" value="<?php echo $res['task_name']; ?>">
                            </div>
                        </div>
                        <div class="complain_view_outer complain_view_outer_mid">
                            <div class="complainview complainview_left"><label>Deadline</label>
                            </div>
                            <div class="complainview complainview_right">
                                <div id="date-picker" class="input-group date" data-date-format="mm-dd-yyyy">
                                    <input class="form-cotrol" type="date" name="datecount"
                                        value="<?php echo $res['end_date']; ?>">
                                    <span class="form-icon-img">
                                        <i class="far fa-calendar-alt form-icon"></i>
                                    </span>
                                </div>
                                <bspn>at <div id="time-picker" class="input-group time" data-date-format="hh-mm-am/pm">
                                        <input class="form-cotrol" type="time" name="timecount"
                                            value="<?php echo $res['end_time']; ?>">
                                        <span class="form-icon-img"><?php echo $res['end_time']; ?>
                                            <i class="far fa-clock form-icon"></i>
                                        </span>
                                    </div>
                            </div>
                        </div>
                        <div class="complain_view_outer ">
                            <div class="complainview complainview_left"><label>Task Details</label>
                            </div>
                            <div class="complainview complainview_right">
                                <input type="text" name="task_details"
                                    class="form-control" value="<?php echo $res['task_details']; ?>">

                            </div>
                        </div>
                        <div class="complain_view_outer complain_view_outer_end">
                            <div class="complainview complainview_left"><label>Document</label>
                            </div>
                            <div class="complainview complainview_right">
                                <input type="file" name="myfile" class="form-control" value="<?php echo $res['task_details']; ?>">
                            </div>
                        </div>

                        <button class="btn btn-success"  name="update" value="update" class="btn btn-primary col-lg-12">Update</button>
                        <a href="dashboard.php"><input type="button" name="" value="Back"
                                class="btn btn-primary col-lg-12"></a>
                                <?php } ?>

                        </form>
                                <?php

// Uploads files
$query = mysqli_query($conn,$q);
if (isset($_POST['update'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'task-file/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    //if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
       // echo "Your file extension must be .zip .pdf or .docx";
    //} elseif ($_FILES['myfile']['size'] > 1000000000) { // file shouldn't be larger than 100Megabyte
       // echo "File too large!";
   // } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $q2 = "UPDATE task set (task_name, end_date, end_time, task_details, file_comp, file_size, downloads) VALUES ('$task_name', '$end_date', '$end_time', '$task_details','$filename', $size, 0)";
            if ($query = mysqli_query($conn,$q2)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    //}
}
?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
<?php } ?>
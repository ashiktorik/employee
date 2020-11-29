<?php
include 'includes/conn.php';
session_start();

//echo $_SESSION['name'];
if(isset($_SESSION['user_role'] ) && $_SESSION['user_role'] !='admin')
{
header("location:login.php");
}
if (($_SESSION['user_role'] ) && $_SESSION['user_role'] =='hr') {
    header("location:displayhr.php");

die();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Employee Information Update</title>
    <?php
	include 'includes/link-head.php';
    include "includes/header.php";
    ?>
</head>

<body>
    <main>
        <div class="helper">
            <div class="col-lg-6 m-auto">
                <?php
	error_reporting(0);
	include 'conn.php';
	
	$id = $_GET['id'];
	$task_name = ucfirst($_POST['task_name']);
    $end_date = ucfirst($_POST['datecount']);
    $end_time = ucfirst($_POST['timecount']);
	$user_id = ucfirst($_POST['user_id']);
	$task_details = ucfirst($_POST['description']);
	//$myfiles = ucfirst($_POST['blood_group']);
	
	$q="select * from task where id = $id";
	$query = mysqli_query($conn,$q);
	$res=mysqli_fetch_array($query);
	{ ?>
                <form method="post">

                    <div>
                        <div class="card-header">
                            <h1 class="text-white text-center">Task Update</h1>
                        </div>


                        <div class="form-control">
                            <label>Uniqu ID</label>
                            <input type="text" name="id" value="<?php echo $res['id']; ?>" class="form-control" readonly>
                        </div>



                        <div class="form-control">
                            <label>Task Name</label>
                            <input type="text" name="task_name" class="form-control"
                                value="<?php echo $res['task_name']; ?>" required>
                        </div>



                        <div class="row" style="margin-right: -15px;
    margin-left: -15px;">
                            <div class="col-6">
                                <div class="form-control">
                                    <label>Deadline Date</label>
                                    <div id="date-picker" class="input-group date" data-date-format="mm-dd-yyyy">
                                        <input class="form-cotrol" type="date" name="datecount"
                                            value="<?php echo $res['end_date']; ?>">
                                        <span class="form-icon-img">
                                            <i class="far fa-calendar-alt form-icon"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control">
                                    <label>Deadline Time</label>
                                    <div id="time-picker" class="input-group time" data-date-format="hh-mm-am/pm">
                                        <input class="form-cotrol" type="time" name="timecount"
                                            value="<?php echo $res['end_time']; ?>">
                                        <span class="form-icon-img">
                                            <i class="far fa-clock form-icon"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="form-control">
                            <label><b>Assaign Employee</b></label>
                            <select select class="selectpicker" multiple data-live-search="true" name="user_id">
                                <?php
include 'includes/conn.php';
$q="SELECT * FROM `tblemployees` ORDER BY `tblemployees`.`id` DESC";
$query = mysqli_query($conn,$q);
while ($row = mysqli_fetch_array($query)) {
?>
                                <option class="form-cotrol" value="<?php echo $row['id'];?>" checked>
                                    <?php echo $row['username'];?></option>
                                <?php } ?>
                            </select>

                            <script>
                                $('.selectpicker').selectpicker('');
                                $('.selectpicker').multiselect({
                                    nonSelectedText: 'Select Framework',
                                    enableFiltering: true,
                                    enableCaseInsensitiveFiltering: true,
                                });
                                $('.selectpicker').selectpicker('selectAll');
                                $('.selectpicker').selectpicker('deselectAll');
                            </script>
                        </div>



                        <div class="form-control">
                            <label>Task Details</label>
                            <textarea type="text" name="description" class="form-control"
                                value="<?php echo $res['task_details']; ?>"></textarea>
                        </div>



                        <div class="form-control">
                            <label>Task Files</label>
                            <input type="file" name="myfile" class="form-control" value="<?php echo $res['myfile']; ?>">
                        </div>



                        <div class="row" style="margin-right: -15px;
    margin-left: -15px;">
                            <div class=" col-4">
                                <button class="btn btn-success col-lg-12" name="update">update</button>
                            </div>

                            <div class="col-4">
                                <button type="button" class="btn btn-success col-lg-12" name="delete" value="Delete"
                                    onclick="deleteme(<?php $_SESSION['id'] = $id; ?>)">Delete</button>
                            </div>
                            <div class="col-4">
                            <a href="emp-profile.php?id=<?php echo $res['id']; ?>" class="text-white"><button
                        class="btn btn-success col-lg-12">Back To Profile</button></a>
                        </div>

                            <script type="text/javascript">
                                function deleteme(delid) {
                                    if (confirm("Are you sure you want to delete ?")) {
                                        window.location.href = "delete.php";
                                    }
                                }
                            </script>
                        </div>
                        <br>
                </form>
            </div>
            <?php
if(isset($_POST['update']))
{
$q2="update task set task_name = '$task_name' , end_date = '$end_date' , end_time = '$end_time' , user_id = $user_id ,  task_details = '$task_details' where id = $id";
if ($conn->query($q2) === TRUE){
  echo" <div class='form-control alert alert-success'>Task assignged</div> ";
    }
    else {
       echo" <div class='form-control alert alert-denger'>Task could not assignged!</div>";
    }

}

if(isset($_POST['delete']))
{
	$_SESSION['id'] = $id;
	header("location:delete.php");
}

if (isset($_POST['view'])) {

$_SESSION['id'] = $id;
	header("location:attendance1.php");

}
?>
            <?php  } ?>
        </div>
    </main>
</body>

</html>
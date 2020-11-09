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
    <?php
    include 'includes/link-head.php';
    include 'includes/header.php';
    ?>
</head>

<body>
    <main>
        <div class="helper">
            <div class="container_fluid container-top">
                    <div class="col-6" style="margin: auto">

                        <div id="task-index">
                            <div class="task_outer">
                                <?php if(isset($_GET['message'])){
    $message = $_GET['message'];
    echo $message;
}
?>
<form method="post" action="includes/insert_assign_leave.php">

<div class="form-group col-lg-6-m-auto">
    <div class="container">
        <div class="card-header">
            <h3 class="text-white">Assaign Emplyee Leave</h3>
        </div>
        <?php
if(!$_SESSION['name']);{ ?>
        <div class="">
            <input type="hidden" name="assigned_by" class="form-control"
                value="<?php echo $_SESSION['name'];?>">
        </div>
        <?php } ?>
        <div class="row" style="margin-right: -15px;
margin-left: -15px;">
            <div class="col-6">
                <div class="date-title data-title .col-auto form-control">
                    <level><b>Valid From</b></level>
                    <div id="date-picker" class="input-group date"
                        data-date-format="mm-dd-yyyy">
                        <input class="form-cotrol" type="date" name="valid_from">
                        <span class="form-icon-img">
                            <i class="far fa-calendar-alt form-icon"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="time-title data-title .col-auto form-control">
                    <level><b>Valid To</b></level>
                    <div id="date-picker" class="input-group date"
                        data-date-format="mm-dd-yyyy">
                        <input class="form-cotrol" type="date" name="valid_to"
                            required>
                        <span class="form-icon-img">
                            <i class="far fa-calendar-alt form-icon"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="input-group-prepend form-control">
            <label><b>Assaign Employee</b></label>
            <select class="selectpicker" multiple data-live-search="true"
                name="emp[]" required>
                <?php
include 'includes/conn.php';
$q="SELECT * FROM `tblemployees` ORDER BY `tblemployees`.`id` DESC";
$query = mysqli_query($conn,$q);
while ($row = mysqli_fetch_array($query)) {
?>
                <option class="form-cotrol" value="<?php echo $row['id'];?>"
                    checked>
                    <?php echo $row['name'];?></option>
                <?php } ?>
            </select>

            <script>
                $('.selectpicker').selectpicker('');
                $('.selectpicker').multiselect({
                    nonSelectedText: 'Select Framework',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                });
            </script>
        </div>
        <div class="form-control"><label><b>Earning Leave</b></label>
            <input type="number" name="earn_leave" class="form-control"
                required></input>
        </div>
        <div class="form-control"><label><b>Medical Leave</b></label>
            <input type="number" name="medical_leave" class="form-control"
                required></input>
        </div>
        <div class="form-control"><label><b>Casual Leave</b></label>
            <input type="number" name="casual_leave" class="form-control"
                required></input>
        </div>
        <button name="submit" class="btn btn-success button">Submit</button><br>
        <div>
        </div>
    </div>

</form>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </main>

    <footer>
    </footer>
</body>

</html>
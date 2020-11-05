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
<?php $id = $_SESSION['id'];
$q="select * from time where id=$id";
$query = mysqli_query($conn,$q);
$res = mysqli_fetch_array($query);
{?>
    <div class="container">
        <div class="col-lg-12"><br>
            <div class="row">
                <h3 class="col-lg-6">Attendance of<font color="#5B5EA6" size="20px"> <?php echo $res['name']; ?></font></h3>
            </div>
<?php } ?>
            <table class="table table-stripped table-hover table-bordered">
                <tr class="text-dark">


                    <th>
                        <h5>day</h5>
                    </th>
                    <th>
                        <h5>date</h5>
                    </th>
                    <th>
                        <h5>time in</h5>
                    </th>
                    <th>
                        <h5>time out</h5>
                    </th>

                </tr>


                <?php
include 'includes/conn.php';
	
$q="select * from time where id=$id";

$query = mysqli_query($conn,$q);

while ($res = mysqli_fetch_array($query)) {
?>

                <tr>

                    <th><?php echo $res['day'] ?></th>
                    <th><?php echo $res['date'] ?></th>
                    <th><?php echo $res['time_in'] ?></th>
                    <th><?php echo $res['time_out'] ?></th>
                </tr>
                <?php }
?>
            </table>
            <a href="update.php?id=<?php echo $id; ?>" class="col-lg-3">
                <button class="btn btn-success col-lg-4"
                        name="back">back</button></a>
        </div>
    </div>

</body>

</html>
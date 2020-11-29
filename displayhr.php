<?php
include 'includes/conn.php';
session_start();

//echo $_SESSION['name'];
if(!$_SESSION['name'])
{
header("location:login.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <?php
    include 'includes/link-head.php';
    include "includes/header.php";
    ?>
</head>

<body>
<main>
<div class="helper">
<div class="container">
        <div class="col-lg-12"><br>
            <div class="row">
                <h3 class="col-lg-8">Displaying Records</h3>
                <!-- <a href="logout.php" class="col-lg-3"><button class="btn btn-success col-lg-4" name="logout">logout</button></a> -->
            </div>
            <table class="table table-stripped table-hover table-bordered">
                <tr class="text-dark">
                    <th>
                        <h5>ID</h5>
                    </th>
                    <th>
                        <h5>Email</h5>
                    </th>
                    <th>
                        <h5>First Name</h5>
                    </th>
                    <th>
                        <h5>Age</h5>
                    </th>
                    <th>
                        <h5>Salary</h5>
                    </th>
                    <th>
                        <h5>Qualification</h5>
                    </th>
                    <th>
                        <h5>Date of Birth</h5>
                    </th>
                    <th>
                        <h5>Date of Join</h5>
                    </th>
                    <th>
                        <h5>Action</h5>
                    </th>
                </tr>


                <?php
include 'includes/conn.php';
	
$q="select * from tblemployees";

$query = mysqli_query($conn,$q);

while ($res = mysqli_fetch_array($query)) {
?>

                <tr>
                    <th><?php echo $res['id'] ?></th>
                    <th><?php echo $res['username'] ?></th>
                    <th><?php echo $res['first_name'] ?></th>
                    <th><?php echo $res['age'] ?></th>
                    <th><?php echo $res['salary'] ?></th>
                    <th><?php echo $res['qualification'] ?></th>
                    <th><?php echo $res['date_of_birth'] ?></th>
                    <th><?php echo $res['date_of_join'] ?></th>
                    <th><a href="viewhr.php?id=<?php echo $res['id']; ?>" class="text-white"><button
                                class="btn btn-success">View</button></a></th>
                </tr>
                <?php }
?>

            </table>
        </div>
    </div>
</div>
</main>
</body>

</html>
<?php
session_start();
include 'includes/conn.php';
if(!$_SESSION['name'])
{
header("location:login.php");
}

$id = $_SESSION['id'];
$q="select * from time where id=$id";
echo $query = mysqli_query($conn,$q);
echo $res = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <?php
    include 'includes/link-head.php';
    include 'includes/header.php';
    ?>
</head>
<body>

<div class="container">
	<div class="col-lg-12"><br>
		<div class="row"> 
		<h3 class="col-lg-6">Attendance of <?php echo $res['name']; ?></h3>
		<a href="viewhr.php?id=<?php echo $id; ?>" class="col-lg-3"><button class="btn btn-success col-lg-4" name="logout">back</button></a>
		<a href="logout.php" class="col-lg-3"><button class="btn btn-success col-lg-4" name="logout">logout</button></a>

        </div>
		<table class="table table-stripped table-hover table-bordered">
			<tr class="text-dark">
				
				
				<th><h5>day</h5></th>
				<th><h5>date</h5></th>
				<th><h5>time in</h5></th>
				<th><h5>time out</h5></th>
				
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
	</div>
</div>

</body>
</html>
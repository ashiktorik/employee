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
	<title></title>
	<?php
	include 'includes/link-head.php';
    include "includes/header.php";
    ?>
</head>

<body>

	<div class="col-lg-6 m-auto">
		<?php
	error_reporting(0);
	include 'conn.php';
	
	$id = $_GET['id'];
	$first_name = ucfirst($_POST['first_name']);
	$last_name = ucfirst($_POST['last_name']);
	$gender = ucfirst($_POST['gender']);
	$religious = ucfirst($_POST['religious']);
	$blood_group = ucfirst($_POST['blood_group']);
	$nationality = ucfirst($_POST['nationality']);
	$address = ucfirst($_POST['address']);
	$nid_num = $_POST['nid_num'];
	$sos_contact = $_POST['sos_contact'];
	$phone = $_POST['phone'];
	$age = $_POST['age'];
	$salary = $_POST['salary'];
	$qualification = ucfirst($_POST['qualification']);
	$dob = date("Y-m-d",strtotime($_POST['dob']));
	$doj = date("Y-m-d",strtotime($_POST['doj']));
	$date_of_birth = $dob;
	$date_of_join = $doj;
	
	$q="select * from tblemployees where id = $id";
	$query = mysqli_query($conn,$q);
	$res=mysqli_fetch_array($query);
	{ ?>
		<form method="post">
			<br>
			<div>
				<div class="card-header">
					<h1 class="text-white text-center">Displaying Employee Details</h1>
				</div><br>
				<label>Uniqu ID</label>
				<input type="text" name="id" value="<?php echo $res['id']; ?>" readonly>
				<br><br>

				<label>National ID</label>
				<input type="text" name="nid_num" class="form-control" value="<?php echo $res['nid_num']; ?>"
					required><br>

				<label>First Name</label>
				<input type="text" name="first_name" class="form-control" value="<?php echo $res['first_name']; ?>"
					required><br>

				<label>Last Name</label>
				<input type="text" name="last_name" class="form-control" value="<?php echo $res['last_name']; ?>"
					required><br>

				<label>Age</label>
				<input type="text" name="age" class="form-control" value="<?php echo $res['age']; ?>" required
					pattern="[0-9]{1,15}" title="this field accepts only numbers"><br>

				<label>Gender</label>
				<select name="gender" class="form-control" value="<?php echo $res['gender']; ?>" required>>
					<option>Male</option>
					<option>Female</option>
					<option>Other</option>
				</select><br>

				<label>Blood Group</label>
				<select name="blood_group" class="form-control" value="<?php echo $res['blood_group']; ?>" required>>
					<option>A+(ve)</option>
					<option>A-(ve)</option>
					<option>B+(ve)</option>
					<option>B-(ve)</option>
					<option>O+(ve)</option>
					<option>O-(ve)</option>
					<option>AB+(ve)</option>
					<option>AB-(ve)</option>
				</select><br>

				<label>Religious</label>
				<input type="text" name="religious" class="form-control" value="<?php echo $res['religious']; ?>"
					required><br>

				<label>Nationality</label>
				<input type="text" name="nationality" class="form-control" value="<?php echo $res['nationality']; ?>"
					required><br>

				<label>Salary</label>
				<input type="text" name="salary" class="form-control" value="<?php echo $res['salary']; ?>" required
					pattern="[0-9]{1,15}" title="this field accepts only numbers"><br>

				<label>Qualification</label>
				<input type="text" name="qualification" class="form-control"
					value="<?php echo $res['qualification']; ?>" required><br>

				<label>Date of Birth</label>
				<input type="text" name="dob" class="form-control" value="<?php echo $res['date_of_birth']; ?>"
					placeholder="date-month-year" required><br>

				<label>Date of Joining</label>
				<input type="text" name="doj" class="form-control" value="<?php echo $res['date_of_join']; ?>"
					placeholder="date-month-year" required><br>

				<label>Address</label>
				<input type="text" name="address" class="form-control" value="<?php echo $res['address']; ?>"
					placeholder="date-month-year" required><br>

				<label>Phone</label>
				<input type="text" name="phone" class="form-control" value="<?php echo $res['phone']; ?>" required
					pattern="[0-9]{1,15}" title="this field accepts only numbers" limit="12"><br>

				<label>Emergency Contact</label>
				<input type="text" name="sos_contact" class="form-control" value="<?php echo $res['sos_contact']; ?>"
					required pattern="[0-9]{1,15}" title="this field accepts only numbers" limit="12"><br>

				<div class="row">
					<div class="col-md-3">
						<button class="btn btn-success" name="done">update</button>
					</div>

					<div class="col-md-3">
						<input type="button" class="btn btn-danger" name="delete" value="Delete"
							onclick="deleteme(<?php $_SESSION['id'] = $id; ?>)">
					</div>
					<div class="col-md-3">
						<a href="attendance1.php?id=<?php echo $res['id']; ?>" class="btn btn-success"
							name="view">attendance</a>
					</div>

					<script type="text/javascript">
						function deleteme(delid) {
							if (confirm("Are you sure you want to delete ?")) {
								window.location.href = "delete.php";
							}
						}
					</script>
				</div><br>

			</div>
		</form>
		<a href="emp-profile.php?id=<?php echo $res['id']; ?>" class="text-white"><button
				class="btn btn-success col-lg-12">Back To Profile</button></a>
	</div>
	<?php
if(isset($_POST['done']))
{
$q2="update tblemployees set first_name = '$first_name' , last_name = '$last_name' , gender = '$gender' , religious = '$religious' ,  blood_group = '$blood_group' , nationality = '$nationality' , address = '$address' , phone = $phone , sos_contact = $sos_contact , age = $age , salary = $salary , qualification = '$qualification' , date_of_birth = '$date_of_birth' , date_of_join = '$date_of_join' where id = $id";
mysqli_query($conn,$q2);
header("location:emp-profile.php?id");
// header("refresh:0");

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
</body>

</html>
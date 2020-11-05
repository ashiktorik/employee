<?php
include 'includes/conn.php';
session_start();

//echo $_SESSION['name'];
if(isset($_SESSION['user_role'] ) && $_SESSION['user_role'] !='employee')
{
    echo $_SESSION['user_role'] ;
header("location:emp-login.php");
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
	include 'includes/emp-header.php';?> 
</head>

<body>
	<?php
	error_reporting(0);
	include 'conn.php';
	$id = $_GET['id'];
	$q="select * from tblemployees where id = $id";
	$query = mysqli_query($conn,$q);
	$res=mysqli_fetch_array($query);
	{ ?>
	<div class="container">
		<div class="profile-top-info">
			<div class="row">
				<div class="col- col-sm-4">
					<div class="content-block profile-wrep">
						<div class="emp-profile-wrep profile-img">
							<img src="<?php echo $res['avatar']; ?>" class="profile-img">
							<button class="img-edit">Change Photo</button>
						</div>
					</div>
				</div>
				<div class="col- col-sm-8">
					<div class="details-right">
						<div class="details-right-title">
							<h3>Basic Informations</h3>
						</div>
						<div class="content-block profile-basic-info-block">
							<div class="row">
								<div class="col- col-sm-4 pf-top-field-left">
									<h5>Name</h5>
								</div>
								<div class="col- col-sm-8"><?php echo $res['first_name']; ?> &nbsp; <?php echo $res['last_name']; ?> </div>
							</div>
							<div class="row">
								<div class="col- col-sm-4 pf-top-field-left">
									<h5>Email</h5>
								</div>
								<div class="col- col-sm-8"><?php echo $res['username']; ?> </div>
							</div>
							<div class="row">
								<div class="col- col-sm-4 pf-top-field-left">
									<h5>National ID</h5>
								</div>
								<div class="col- col-sm-8"><?php echo $res['nid_num']; ?> </div>
							</div>
							<div class="row">
								<div class="col- col-sm-4 pf-top-field-left">
									<h5>Phone Number</h5>
								</div>
								<div class="col- col-sm-8"><?php echo $res['phone']; ?> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="profile-bottom-info full-information">

			<div class="details-title">
				<h3>Employee Details</h3>
			</div>
			<div class="content-block full-details-content-block">

				<div class="row full-details-row">
					<div class="col- col-sm-6 col-full-detail-left">
						<div class="row">
							<div class="col- col-sm-4 pf-top-field-left">
								<h5>Age</h5>
							</div>
							<div class="col- col-sm-8"><?php echo $res['age']; ?> </div>
						</div>
					</div>
					<div class="col- col-sm-6 col-full-detail-right">
						<div class="row">
							<div class="col- col-sm-4 pf-top-field-left">
								<h5>Gender</h5>
							</div>
							<div class="col- col-sm-8"><?php echo $res['gender']; ?> </div>
						</div>
					</div>
				</div>
				<div class="row full-details-row">
					<div class="col- col-sm-6 col-full-detail-left">
						<div class="row">
							<div class="col- col-sm-4 pf-top-field-left">
								<h5>Blood Group</h5>
							</div>
							<div class="col- col-sm-8"><?php echo $res['blood_group']; ?> </div>
						</div>
					</div>
					<div class="col- col-sm-6 col-full-detail-right">
						<div class="row">
							<div class="col- col-sm-4 pf-top-field-left">
								<h5>Nationality</h5>
							</div>
							<div class="col- col-sm-8"><?php echo $res['nationality']; ?> </div>
						</div>
					</div>
				</div>
				<div class="row full-details-row">
					<div class="col- col-sm-6 col-full-detail-left">
						<div class="row">
							<div class="col- col-sm-4 pf-top-field-left">
								<h5>Date Of Birth</h5>
							</div>
							<div class="col- col-sm-8"><?php echo $res['date_of_birth']; ?> </div>
						</div>
					</div>
					<div class="col- col-sm-6 col-full-detail-right">
						<div class="row">
							<div class="col- col-sm-4 pf-top-field-left">
								<h5>Date Of Join</h5>
							</div>
							<div class="col- col-sm-8"><?php echo $res['date_of_join']; ?> </div>
						</div>
					</div>
				</div>
				<div class="row full-details-row">
					<div class="col- col-sm-6 col-full-detail-left">
						<div class="row">
							<div class="col- col-sm-4 pf-top-field-left">
								<h5>Qualification</h5>
							</div>
							<div class="col- col-sm-8"><?php echo $res['qualification']; ?> </div>
						</div>
					</div>
					<div class="col- col-sm-6 col-full-detail-right">
						<div class="row">
							<div class="col- col-sm-4 pf-top-field-left">
								<h5>Salary</h5>
							</div>
							<div class="col- col-sm-8"><?php echo $res['salary']; ?> </div>
						</div>
					</div>
				</div>
				<div class="row full-details-row">
					<div class="col- col-sm-6 col-full-detail-left">
						<div class="row">
							<div class="col- col-sm-4 pf-top-field-left">
								<h5>Address</h5>
							</div>
							<div class="col- col-sm-8"><?php echo $res['address']; ?> </div>
						</div>
					</div>
					<div class="col- col-sm-6 col-full-detail-right">
						<div class="row">
							<div class="col- col-sm-4 pf-top-field-left">
								<h5>Emergency Contact</h5>
							</div>
							<div class="col- col-sm-8"><?php echo $res['sos_contact']; ?> </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="container">
		<div class="profile-action-info">
		<div class="row">
			<div class="col-md-3">
			<a href="update.php?id=<?php echo $res['id']; ?>" class="text-white"><button class="btn btn-success">Update</button></a>
			</div>
		</div><br>
		<a href="emp-dashboard.php"><input type="button" name="" value="Back to records"
				class="btn btn-primary col-lg-12"></a>
	</div>
	</div>
	<?php  } ?>
</body>

</html>
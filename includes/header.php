<?php
include 'includes/conn.php';


// $q="SELECT * FROM login where name=$id and avatar=$img";

// $query = mysqli_query($conn,$q);

// while ($res = mysqli_fetch_array($query)) ;

if(!$_SESSION['name'])
{
header("location:login.php");
}
$time=time();
$id = $_SESSION['name'];
$avatar_path = $_SESSION['avatar'];
$q = "select * from login where name = '$id'";
$query = mysqli_query($conn,$q);
while ($res = mysqli_fetch_array($query))
 {
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

<nav class="menu" tabindex="0">
	<div class="smartphone-menu-trigger"></div>
	<header class="avatar">
		<div class="user_avatar_head"><img src="<?php echo $res['avatar']?>"></div>
		<div class="user_name_head">
			<h2><?php echo $id?></h2>
		</div>
	</header>
	<ul>
		<a href="dashboard.php" name="dashboard">
			<li tabindex="0" class="icon-dashboard"><span>Dashboard</span></li>
		</a>
		<a href="task.php" name="insert">
			<li tabindex="0" class="icon-customers"><span>Assign Task</span></li>
		</a>
		<?php
		if($_SESSION ['user_role'] == 'admin'){
			?>
		<a href="insert.php" name="insert">
			<li tabindex="0" class="icon-users"><span>Add Employee</span></li>
		</a>
		<?php } ?>
		<a href="emp-list.php" name="insert">
			<li tabindex="0" class="icon-emp-list"><span>All Employee</span></li>
		</a>
		<a href="assign-leave.php" name="insert">
			<li tabindex="0" class="icon-settings"><span>Assign Leave</span></li>
		</a>
		<a href="logout.php" name="logout">
			<li tabindex="0" class="icon-logout">logout</li>
		</a>
	</ul>

</nav>
<?php }
?>
<?php
include 'conn.php';
if(!$_SESSION['username'])
{
header("location:emp-login.php");
}
$time=time();
$id = $_SESSION['username'];
$avatar_path = $_SESSION['avatar'];
$q = "select * from tblemployees where username = '$id'";
$query = mysqli_query($conn,$q);
while ($res = mysqli_fetch_array($query)) {
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
</ul>
<nav class="menu" tabindex="0">
	<div class="smartphone-menu-trigger"></div>
	<header class="avatar">
	<a href="emp-edit-profile.php?id=<?php echo $res['id']; ?>" name="Profile">
			<span class="icon-edit"></span>
		<img src="<?php echo $res['avatar']?>" />
		<h2 style="color: #fff; padding:7px;"><?php echo $id ?></h2>
	</header>
	<ul>
		<a href="emp-dashboard.php" name="dashboard">
			<li tabindex="0" class="icon-dashboard"><span>Dashboard</span></li>
		</a>
		<a href="" name="insert">
			<li tabindex="0" class="icon-customers"><span>Customers</span></li>
		</a>
		<a href="" name="insert">
			<li tabindex="0" class="icon-users"><span>Add employee</span></li>
		</a>
		<a href="compose-complain.php" name="insert">
			<li tabindex="0" class="icon-program"><span>Submit A Complain</span></li>
		</a>
		<a href="emp-logout.php" name="emp-logout">
			<li tabindex="0" class="icon-logout">logout</li>
		</a>
	</ul>
</nav>
<?php }
?>
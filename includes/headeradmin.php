<?php
include 'conn.php';
$q="select * from login";

$query = mysqli_query($conn,$q);

while ($res = mysqli_fetch_array($query)) {
?>


<nav class="menu" tabindex="0">
	<div class="smartphone-menu-trigger"></div>
	<header class="avatar">
		<img src="<?php echo $res['avatar']?>" />
		<h2><?php echo $res['name']?></h2>
	</header>
	<ul>
		<a href="display.php" name="dashboard">
			<li tabindex="0" class="icon-dashboard"><span>Dashboard</span></li>
		</a>
		<a href="" name="insert">
			<li tabindex="0" class="icon-customers"><span>Customers</span></li>
		</a>
		<a href="insert.php" name="insert">
			<li tabindex="0" class="icon-users"><span>Add employee</span></li>
		</a>
		<a href="" name="insert">
			<li tabindex="0" class="icon-settings"><span>Settings</span></li>
		</a>
		<a href="logout.php" name="logout">
			<li tabindex="0" class="icon-logout">logout</li>
		</a>
	</ul>
</nav>
<?php }
?>
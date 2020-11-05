<?php
include 'conn.php';


// $q="SELECT * FROM login where name=$id and avatar=$img";

// $query = mysqli_query($conn,$q);

// while ($res = mysqli_fetch_array($query)) ;

if(!$_SESSION['name'])
{
header("location:login.php");
}

$id = $_SESSION['name'];
 {
?>


<nav class="menu" tabindex="0">
	<div class="smartphone-menu-trigger"></div>
	<header class="avatar">
		<img src="<?php 
	echo $_SESSION['img'];
?>" />
		<h2><?php echo $id?></h2>
	</header>
	<ul>
		<a href="" name="dashboard">
			<li tabindex="0" class="icon-dashboard"><span>Dashboard</span></li>
		</a>
		<a href="" name="insert">
			<li tabindex="0" class="icon-customers"><span>Customers</span></li>
		</a>
		<?php
		if($_SESSION ['user_role'] == 'admin'){
			?>
		<a href="" name="insert">
			<li tabindex="0" class="icon-users"><span>Add employee</span></li>
		</a>
		<?php } ?>
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
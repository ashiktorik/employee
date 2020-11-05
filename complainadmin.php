<?php 
session_start();
// $_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "", "test");
if(isset($_SESSION['user_role'] ) && $_SESSION['user_role'] !='admin')
{
header("location:login.php");
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
<main>
        <div class="helper">
            <div class="container_fluid top_container">
            <div class="col-lg-6 m-auto">
        <br>
        <div><?php
        error_reporting(0);
include 'includes/conn.php';

$id = $_GET['id'];
$name = ucfirst($_POST['name']);

$q="select * from complain where id = $id";
$query = mysqli_query($conn,$q);
$res=mysqli_fetch_array($query);{

?>
            <div class="card-header">
                <h1 class="text-white text-center">Displaying Employee Details</h1>
            </div><br>
            <div type="hidden" name="id" value="<?php echo $res['id']; ?>"></div>
            <div class="complain_view_outer">
                <div class="complainview complainview_left"><label>Name</label>
                </div>
                <div class="complainview complainview_right">
                    <?php echo $res['username']; ?>
                </div>
            </div>
            <div class="complain_view_outer complain_view_outer_mid">
                <div class="complainview complainview_left"><label>Subject</label>
                </div>
                <div class="complainview complainview_right">
                <?php echo $res['subject']; ?>
                </div>
            </div>
            <div class="complain_view_outer complain_view_outer_end">
                <div class="complainview complainview_left"><label>Massage</label>
                </div>
                <div class="complainview complainview_right">
                <?php echo $res['text']; ?>
                </div>
            </div>
            <div class="complain_view_outer complain_view_outer_end">
                <div class="complainview complainview_left"><label>Document</label>
                </div>
                <div class="complainview complainview_right"><img style="max-width: 200px;"
                src="<?php echo $res['file_comp']; ?>" >
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"><input type="button" class="btn btn-danger" name="delete" value="Delete"
                        onclick="deleteme(<?php $_SESSION['id'] = $id; ?>)"></div>
                <script type="text/javascript">
                    function deleteme(delid) {
                        if (confirm("Are you sure you want to delete ?")) {
                            window.location.href = "delete-complain.php";
                        }
                    }
                </script>
                <div class="col-md-3"><a href="dashboard.php"><input type="button" name="" value="Back"
                    class="btn btn-primary col-lg-12"></a></div>
            </div>
                <?php } ?>
        </div>
    </div>
    <?php

 ?>
</div>
</div>
</main>
</body>

</html>
<?php
include 'includes/conn.php';
session_start();

// echo $_SESSION['name'];
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
    <main>
        <div class="helper">
            <div class="container_fluid top_container">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="dboard_card">
                                <div class="row dboard_outer">
                                    <div class="col-4">
                                        <img src="./img/user.png" class="dboard_card_img"></div>
                                    <div class="col-8">
                                        <?php $q="SELECT count(id) AS total FROM tblemployees";
                                    $result=mysqli_query($conn, $q);
                                    $values=mysqli_fetch_assoc($result);
                                    $num_rows=$values['total'];
                                    {?>
                                        <h4>Total Employee <bspn><?php echo $num_rows; ?></h4> <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="dboard_card">
                                <div class="row dboard_outer">
                                    <div class="col-4">
                                        <img src="./img/user.png" class="dboard_card_img"></div>
                                    <div class="col-8">
                                        <?php $q="SELECT count(id) AS total FROM tblemployees";
                                    $result=mysqli_query($conn, $q);
                                    $values=mysqli_fetch_assoc($result);
                                    $num_rows=$values['total'];
                                    {?>
                                        <h4>Total Employee <bspn><?php echo $num_rows; ?></h4> <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="dboard_card">
                                <div class="dboard_outer"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="dboard_card">
                                <div class="dboard_outer"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container_fluid top_container">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-title-holder">
                                            <h3>New Complains</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <table class="table table-stripped table-hover table-bordered">
                                            <tr class="text-dark">
                                                <th>
                                                    <h5>User ID</h5>
                                                </th>
                                                <th>
                                                    <h5>Name</h5>
                                                </th>
                                                <th>
                                                    <h5>Subject</h5>
                                                </th>
                                                <th>
                                                    <h5>Action</h5>
                                                </th>
                                            </tr>


                                            <?php
include 'includes/conn.php';
$q="select * from complain";
$query = mysqli_query($conn,$q);
while ($res = mysqli_fetch_array($query)) {
?>

                                            <tr>
                                                <th><?php echo $res['dpid'] ?></th>
                                                <th><?php echo $res['username'] ?></th>
                                                <th><?php echo $res['subject'] ?></th>
                                                <th><a href="complainadmin.php?id=<?php echo $res['id']; ?>"
                                                        class="text-white"><button
                                                            class="btn btn-success">View</button></a>
                                                </th>
                                            </tr>
                                            <?php }
?>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-title-holder">
                                            <h3>Runing task</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <table class="table table-stripped table-hover table-bordered">
                                            <tr class="text-dark">
                                                <th>
                                                    <h5>Task Name</h5>
                                                </th>
                                                <th>
                                                    <h5>Start At</h5>
                                                </th>
                                                <th>
                                                    <h5>End Date</h5>
                                                </th>
                                                <th>
                                                    <h5>Action</h5>
                                                </th>
                                            </tr>


                                            <?php
include 'includes/conn.php';
$q="select * from task ";
$query = mysqli_query($conn,$q);
while ($res = mysqli_fetch_array($query)) {
?>

                                            <tr>
                                                <th><?php echo $res['task_name'] ?></th>
                                                <th><?php echo $res['create_date'] ?></th>
                                                <th><?php echo $res['end_date'] ?></th>
                                                <th><a href="task-view.php?id=<?php echo $res['id']; ?>"
                                                        class="text-white"><button
                                                            class="btn btn-success">View</button></a>
                                                </th>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="container_fluid">
                    <div class="col-lg-12"><br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-title-holder">
                                    <h3>Displaying Records</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <table class="table table-stripped table-hover table-bordered">
                                <tr class="text-dark">
                                    <th>
                                        <h5>Employee</h5>
                                    </th>
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

$q="select * from tblemployees Orders LIMIT 5";

$query = mysqli_query($conn,$q);

while ($res = mysqli_fetch_array($query)) {
?>


                                <tr>
                                    <th class="emp-list-image"><img src="<?php echo $res['avatar']?>"></th>
                                    <th><?php echo $res['id'] ?>
                                        <div class="online-status-row">
                                            <span class="online-active"></span>
                                            <span class="online-on-leave"></span>
                                            <span class="online-deactive"></span>
                                        </div>
                                    </th>
                                    <th><?php echo $res['name'] ?></th>
                                    <th><?php echo $res['first_name'] ?> &nbsp; <?php echo $res['last_name'] ?></th>
                                    <th><?php echo $res['age'] ?></th>
                                    <th><?php echo $res['salary'] ?></th>
                                    <th><?php echo $res['qualification'] ?></th>
                                    <th><?php echo $res['date_of_birth'] ?></th>
                                    <th><?php echo $res['date_of_join'] ?></th>
                                    <th><a href="emp-profile.php?id=<?php echo $res['id']; ?>"
                                            class="text-white"><button class="btn btn-success">View</button></a>
                                    </th>
                                </tr>
                                <?php }
?>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="container_fluid">
                    <div class="col-lg-12"><br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-title-holder">
                                    <h3>Latest Leave Applications</h3>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th width="200">Employe Name</th>
                                            <th width="120">Leave Type</th>

                                            <th width="180">Posting Date</th>
                                            <th>Status</th>
                                            <th align="center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
include 'includes/conn.php';
$q = "SELECT tblleaves.id as lid,tblemployees.name,tblemployees.id,employee.age,tblemployees.qualification,tblleaves.LeaveType,tblleaves.PostingDate,tblleaves.Status from tblleaves join tblemployees on tblleaves.empid=tblemployees.id order by lid desc limit 6";
$query = mysqli_query($conn,$q);
$query->execute();
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];
$cnt=1;
if($query->rowCount() > 0)
{
 foreach($results as $result)
{         
      ?>

                                        <tr>
                                            <td> <b><?php echo htmlentities($cnt);?></b></td>
                                            <td><a href="editemployee.php?empid=<?php echo htmlentities($result->id);?>"
                                                    target="_blank"><?php echo htmlentities($result->name." ".$result->id);?>(<?php echo htmlentities($result->qualification);?>)</a>
                                            </td>
                                            <td><?php echo htmlentities($result->LeaveType);?></td>
                                            <td><?php echo htmlentities($result->PostingDate);?></td>
                                            <td><?php $stats=$result->Status;
if($stats==1){
                                             ?>
                                                <span style="color: green">Approved</span>
                                                <?php } if($stats==2)  { ?>
                                                <span style="color: red">Not Approved</span>
                                                <?php } if($stats==0)  { ?>
                                                <span style="color: blue">waiting for approval</span>
                                                <?php } ?>

                                            </td>
                                            <td>
                                            <td><a href="leave-details.php?leaveid=<?php echo htmlentities($result->lid);?>"
                                                    class="waves-effect waves-light btn blue m-b-xs"> View Details</a>
                                            </td>
                                        </tr>
                                        <?php } $cnt++;} ?>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>



            </div>
        </div>
    </main>

</body>

</html>
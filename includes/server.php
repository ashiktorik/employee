<?php
error_reporting(0);
session_start();
include "includes/conn.php";

$name = $_POST['name'];
$Password = $_POST['pass'];

if (isset($_POST['Login'])) {
    $q = "select * from login where name = '$name' and password = '$Password'";

    $res = mysqli_query($conn, $q);
    $res1 = mysqli_num_rows($res);

    if ($res1 == 0) {
        header("location:login.php?user=Incorrect username or Password");
    }

    while ($row = mysqli_fetch_array($res)) {
        // filter query and set variable
        if ($row['name'] == $name  &&  $row['password'] == $Password) {
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $Password;
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_role'] = $row['user_role'];
            $_SESSION['avatar'] = $img;

            if ($row['user_role'] == 'admin') {

                header("location:dashboard.php");
            } elseif ($row['user_role'] == 'hr') {
                header("location:displayhr.php");
            }
        }
    }
}

?>

<!-- Employee login db -->
<?php
error_reporting(0);
session_start();
include "includes/conn.php";

$username = $_POST['username'];
$Password = $_POST['password'];


if (isset($_POST['login_emp'])) {
    $q = "SELECT * FROM tblemployees WHERE username = '$username' and password = '$Password'";

    $res = mysqli_query($conn, $q);
    $res1 = mysqli_num_rows($res);

    if ($res1 == 0) {
        header("location:emp-login.php?user=Incorrect username or Password");
    }

    while ($row = mysqli_fetch_array($res)) {
        // filter query and set variable
        if ($row['username'] == $username  &&  $row['password'] == $Password) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $row['id'];
            $_SESSION['password'] = $Password;
            $_SESSION['user_role'] = $row['user_role'];
            $_SESSION['avatar'] = $img;

            if ($row['user_role'] == 'employee') {

                header("location:emp-dashboard.php");
            } else{
                header("location:emp-login.php");
            }  
        }
    }
}

?>

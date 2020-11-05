<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli("localhost", "root", "", "test");

//the form has been submitted with post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //two passwords are equal to each other
    if ($_POST['pass'] == $_POST['confirmpass']) {

        //set all the post variables
        $name = $mysqli->real_escape_string($_POST['name']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = md5($_POST['pass']); //md5 has password for security
        $avatar_path = $mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);

        //make sure the file type is image
        if (preg_match("!image!",$_FILES['avatar']['type'])) {

            //copy image to images/ folder
            if (copy($_FILES['avatar']['tmp_name'], $avatar_path)){

                //set session variables
                $_SESSION['name'] = $name;
                $_SESSION['avatar'] = $avatar_path;
                $sql_u = "SELECT * FROM login WHERE name = '$name'";
                $sql_e = "SELECT * FROM login WHERE email = '$email'";
              $res_u = mysqli_query($mysqli, $sql_u) or die (mysqli_error($mysqli));
                $res_e = mysqli_query($mysqli, $sql_e) or die (mysqli_error($mysqli));

                if (mysqli_num_rows($res_u) > 0){
                    $_SESSION['message'] = "Sorry Username is not Available";}
                    else if(mysqli_num_rows($res_e) > 0){
                        $_SESSION['message'] = "Sorry Email Already taken";}
                        else{

                //insert user data into database
                $sql = "INSERT INTO login ( name, email, password, avatar) "
                   . "VALUES ('$name', '$email', '$password', '$avatar_path')";

                //if the query is successsful, redirect to welcome.php page, done!

                if ($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Registration succesful! Added $name to the database!";
                    echo mysqli_num_rows($res_u);
                    echo mysqli_num_rows($res_e);
                  //  header("location: login.php");
            }
                else {
                    $_SESSION['message'] = 'User could not be added to the database!';
                }
                $mysqli->close();
            }
        }
            else {
                $_SESSION['message'] = 'File upload failed!';
            }
        }
        else {
            $_SESSION['message'] = 'Please only upload GIF, JPG or PNG images!';
        }
    }
    else {
        $_SESSION['message'] = 'Two passwords do not match!';
    }
}
?>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet"
    type="text/css" />
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
    <div class="module">
        <h1>Create an account</h1>
        <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
            <input type="text" placeholder="User Name" name="name" required />
            <input type="email" placeholder="Email" name="email" required />
            <input type="text" placeholder="Password" name="pass" autocomplete="new-password" required />
            <input type="text" placeholder="Confirm Password" name="confirmpass" autocomplete="new-password" required />
            <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*"
                    required /></div>
            <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
        </form>
    </div>
</div>
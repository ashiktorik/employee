<?php
include "includes/server.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Employee Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"
        integrity="sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous">
    </script>
    <title>Login
    </title>
    <?php
    ?>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
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
</head>

<body style="padding-top:0px; padding-left:0">
    <div class="container index-hero" id="login-outer">
        <div class="image-overlay"></div>
        <div class="index-content-wrapper index-has-mage-wrapper">
            <div class="row">
                <div class="col-sm-6">
                    <div class="index-title">
                        <h3>Welcome to</h3>
                        <br>
                        <h1>Employee Management System<h1>
                    </div>
                </div>

                <div class=" col-sm-6">
                    <div id="login-index">
                        <div class="form_outer">
                            <form method="post">
                                <div class="form-group col-lg-6-m-auto">
                                    <div class="container">
                                        <div class="card-header bg-dark">
                                            <h3 class="text-white">Login</h3>
                                        </div><br>
                                        <label><b>Username</b></label>
                                        <input type="text" name="name" class="form-control" required><br>
                                        <label><b>Password</b></label>
                                        <input type="password" name="pass" class="form-control" required><br>
                                        <button name="Login" class="btn btn-success button">Login</button><br>
                                        <div>
                                            <p class="text-danger"><?php echo $_GET['user']; ?></p><br>
                                            <p><?php echo $_GET['password']; ?></p>
                                            <p><?php echo $_GET['both']; ?></p>
                                        </div>
                                        <p>Don't Have Account? <a href="form.php">Register Now</a></p>

                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
    </footer>
</body>

</html>
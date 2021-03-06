<?php
include('Config.php');
if (isset($_POST['login'])) {
    Login($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="" method="post" class="row g-3" id="login">
                        <h4>Welcome</h4>
                        <div class="col-12">
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php if (isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?>">
                        </div>
                        <div class="col-12">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php if (isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberme" name="rememberme">
                                <label class="form-check-label" for="rememberme"> Remember me</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-end" name="login">Login</button>
                        </div>
                    </form>
                    <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">Have not account yet? <a href="./Regis.php">Signup</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>
</php>
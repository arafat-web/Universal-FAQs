<?php
include "config/database.php";
$session = new Databases;
session_start();

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myemail = mysqli_real_escape_string($session->connect, $_POST['email']);
    $mypassword = mysqli_real_escape_string($session->connect, $_POST['password']);

    $sql = "SELECT id, email FROM `admin` WHERE email = '$myemail' and password = '$mypassword'";
    $result = mysqli_query($session->connect, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        //  session_register("myusername");
        $_SESSION['login_id'] = $row["id"];
        $_SESSION['login_email'] = $myemail;
        header("location: index.php");
    } else {
        $error = '<p class="text-white text-center bg-danger p-2">' . 'Your Email or Password is Invalid!' . '</p>';

    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login - Universal FAQs</title>
    <meta name="robots" content="noindex, nofollow">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4"> <a href="index.html"
                                    class="logo d-flex align-items-center w-auto"> <img src="assets/img/logo.png"
                                        alt=""> <span class="d-none d-lg-block">Universal FAQs</span> </a></div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <?php echo $error ?>
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your email & password to login</p>
                                    </div>
                                    <form method="post" class="row g-3">
                                        <div class="col-12"> <label for="email" class="form-label">Email</label>
                                            <div class="input-group has-validation"><input type="email" name="email"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-12"> <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check"> <input class="form-check-input" type="checkbox"
                                                    name="remember" value="true" id="rememberMe"> <label
                                                    class="form-check-label" for="rememberMe">Remember me</label></div>
                                        </div>
                                        <div class="col-12"> <button class="btn btn-primary w-100"
                                                type="submit">Login</button></div>
                                    </form>
                                </div>
                            </div>
                            <div class="credits"> Developed by <a href="https://arafat.click/">Arafat Hossain</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main> <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
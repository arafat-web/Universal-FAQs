<?php
session_start();
include_once "database.php";
$data = new Databases;
$user = $_SESSION["login_id"];
$admin_data = $data->viewData("admin", "", "id", $user);

foreach ($admin_data as $login_user) {
    # code...
    if (!($login_user["email"] == $_SESSION['login_email'])) {
        header("location: login.php");
        die();
    }
}

if (!isset($_SESSION['login_email'])) {
    header("location: login.php");
    die();
}
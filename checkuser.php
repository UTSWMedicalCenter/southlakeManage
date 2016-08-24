<?php
session_start();
if((!empty($_POST['inputEmail'])) && (!empty($_POST['inputPassword']))) {

    $email = $_POST['inputEmail'];
    $pwd = $_POST['inputPassword'];

    if($email == "lululiu008@gmail.com" && $pwd == "123456") {
        $_SESSION['accountEmail'] = $email;
        header("Location: ../database/");
    } else {
        header("Location: login.php");
    }
} else {
    header("Location: login.php");
}
?>

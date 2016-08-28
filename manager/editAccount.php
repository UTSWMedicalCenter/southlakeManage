<?php
session_start();

if (!isset($_SESSION['accountEmail'])) {
    header("Location: ../login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--    <link rel="icon" href="../../favicon.ico">-->

    <!-- Bootstrap core CSS -->
    <link href="../style/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../style/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.min.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<?php include "header.php"?>

<div class="container">

    <form class="" role="form" method="POST" name="createAccountForm" action="sendAccountForm.php">

        <div class="form-group">
            <label for="accountID">AccountID</label>
            <input type="text" class="form-control" id="accountID" name="accountID" readonly>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="southlake0000" required>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="phoneNumber">PhoneNumber</label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
        </div>

        <div class="form-group">
            <label for="homeAddress">HomeAddress</label>
            <input type="text" class="form-control" id="homeAddress" name="homeAddress" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>






<script src="../js/bootstrap.min.js"></script>
</body>
</html>

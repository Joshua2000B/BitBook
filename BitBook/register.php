<!DOCTYPE html>
<html>

    <link rel="stylesheet" href="BitBook.css">
<header>
    <div class="topnav" >
        <img src="https://st2.depositphotos.com/1069290/5358/v/950/depositphotos_53581759-stock-illustration-book-icon-vector-logo.jpg">
        <a href="landing.html">Home</a>
        <a href="login.html">Login</a>
        <a class="active" href="register.html">Register</a>
    </div>
</header>

<body>
<div>
<?php
    require("dbConnect.php");

    if(!get_magic_quotes_gpc()) {
        $uname = addslashes($_POST['uname']);
        $psw = $_POST['psw'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
    } else {
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
    }
?>
</div>
</body>
</html>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
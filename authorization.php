<?php
require_once 'functions.php';
$functs = new funcs();
$login = "";
$pass = "";
$error = "";
if (!empty($_POST) && isset($_POST["submitbutton"])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];
}
if ($res = $functs->user_exist($login, $pass)) {
    $functs->login($res, $login, $pass);
    header("Location: profile.php");
} else {
    echo "Login or password entered incorrect";
}
?>
<html>
<head>
    <meta charset="utf-8">
    <style>
        form {
            text-align: center;
        }
    </style>
</head>
<body>
<form method="post">
    <br/>

    <h2>Enter</h2>
    Login: <input type="text" name="login" value="" required> <br/><br/>
    Password: <input type="password" name="pass" value="" required> <br/><br/>
    <input type="submit" value="Login" name="submitbutton"/>

</form>
</body>
</html>

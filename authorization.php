<?php
require_once 'functions.php';
$functs = new funcs();
$login = "";
$pass = "";
$error = "";
if (isset($_POST["submitbutton"])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if ($res = $functs->user_exist($login, $pass)) {
        $functs->login($res);
        header("Location: profile.php");
    } else {
        echo "<br><div class='clear alert alert-danger'><center>Login or password entered incorrect</center></div>";
    }}
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<form class="container" method="post">
    <div class="col-sm-4 centered">
        <div class="row titleForms">Enter</div>
        <div class="row">
            <table class="tableForms">
                <tr>
                    <td>Login:</td>
                    <td><input type="text" name="login" value="" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="pass" value="" required></td>
                </tr>
            </table>
            <div class="buttonsForms">
                <a class="col-xs-4 btn btn-danger" href="index.php">Home</a>
                <input class="col-xs-4 btn btn-success" type="submit" value="Login" name="submitbutton"/>
            </div>
        </div>
    </div>

</form>

</body>
</html>

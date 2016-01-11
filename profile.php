<?php
require_once "functions.php";
session_start();
$functs = new funcs();
$user_id=$_SESSION["user_id"];
$user_inf = $functs->get_user($user_id);
?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<!--
<h3><?php echo $user_inf['title'];?></h3>
<h5>Type: <?php echo $ad_inf['type'];?></h5>
<h5>Category: <?php echo $ad_inf['categ'];?></h5>
<p><?php echo $ad_inf['create_data'];?></p>
<p><?php echo $ad_inf['cost']."$";?></p>
<p><?php echo $ad_inf['email'];?></p>
<img src='<?php echo "photos/".$ad_inf["img"];?>'>
<p><?php echo $ad_inf['message'];?></p>
-->
</body>
</html>


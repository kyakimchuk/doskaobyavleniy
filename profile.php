<?php
require_once "functions.php";
session_start();
$functs = new funcs();
$user_id = $_SESSION["user_id"];
$user_inf = $functs->get_user($user_id);
$user_ads = $functs->get_user_ads($user_inf['email']);
$ads_count = count($user_ads);
?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>My information</h2>

<p>Login: <?php echo $user_inf['login']; ?></p>

<p>Name: <?php echo $user_inf['name']; ?></p>

<p>Surname: <?php echo $user_inf['surname']; ?></p>

<p>Email: <?php echo $user_inf['email']; ?></p>
<h2>My ads</h2>
<?php
for ($i = 0; $i < $ads_count; $i++) {
    $categ = $functs->get_categ($user_ads[$i]['category_id']);
    $type = $functs->get_type($user_ads[$i]['type_id']);
    echo "<div class='obyavlenie'>";
    $temp = $user_ads[$i]['img'];
    echo "<img style='width:150px' src='photos/" . $temp . "'>";
    echo "<a class='link' href='advert.php?id=" . $user_ads[$i]['id_ad'] . "'>" . $user_ads[$i]['title'] . "</a>";
    echo "<h5>Type: " . $type . "</h5>";
    echo "<h5>Category: " . $categ . "</h5>";
    echo "<div class='create_data'>" . $user_ads[$i]['create_data'] . "</div>";
    echo $user_ads[$i]['cost'] . "$";
    echo "</div>";
    echo "<br/>";
}?>
<?php if ($ads_count==0) :?>
    <p>You don't have ads now</p>
    <a href="add_ad.php"><span class="glyphicon glyphicon-pencil"></span>Add an advert</a>
<?php endif;?>
</body>
</html>


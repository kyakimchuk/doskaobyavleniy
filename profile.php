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
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<div class="container">
    <div class="row">
    <h2>My information</h2>
    <p>Login: <?php echo $user_inf['login']; ?></p>
    <p>Name: <?php echo $user_inf['name']; ?></p>
    <p>Surname: <?php echo $user_inf['surname']; ?></p>
    <p>Email: <?php echo $user_inf['email']; ?></p>
    <a href="add_ad.php">Add an advert</a>
    <a href="index.php">Home</a>
    <a href="logout.php">Log out</a>
    <h2>My ads</h2>
    </div>
    <div class="row">
        <?php
        for ($i = 0; $i < $ads_count; $i++) {
            $categ = $functs->get_categ($user_ads[$i]['category_id']);
            $type = $functs->get_type($user_ads[$i]['type_id']);
            echo "<div class='obyavlenie'>";
            $temp = $user_ads[$i]['img'];
            echo "<div class='imgPreview'><img src='photos/" . $temp . "'></div>";
            echo "<span class='link'><a href='advert.php?id=" . $user_ads[$i]['id_ad'] . "'>" . $user_ads[$i]['title'] . "</a></span>";
            echo "<div class='adsType' id='type'>Type: " . $type . "</div>";
            echo "<div class='adsCategory' id='category'>Category: " . $categ . "</div>";
            echo "<div class='create_data'>" . $user_ads[$i]['create_data'] . "</div>";
            echo "<div class='cost'>" . $user_ads[$i]['cost'] . "$</div>";
            echo "</div>";
            echo "<br/>";
        }
        ?>
    </div>
    <?php if ($ads_count == 0) : ?>
        <p>You don't have ads now</p>
    <?php endif; ?>
</div>
</body>
</html>


<?php
require_once "functions.php";
$functs = new funcs();
$connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
$mas2 = $connection->query('SELECT id_ad,title,type_id,category_id,cost,img,create_data FROM ads');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/script.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            <div id='cssmenu'>
                <ul>
                    <li><a href="/"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                    <li><a href="registration.php"><span class="glyphicon glyphicon-plus"></span>Register</a></li>
                    <li class='active'><a href="add_ad.php"><span class="glyphicon glyphicon-pencil"></span>Add an
                            advert</a></li>
                    <li class='last'><a href="authorization.php"><span class="glyphicon glyphicon-user"></span>Go to
                            profile</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row"><h2>Ads</h2></div>
            <div class="row">
                <?php
                while ($row = $mas2->fetch()) {
                    $categ = $functs->get_categ($row['category_id']);
                    $type = $functs->get_type($row['type_id']);
                    echo "<div class='obyavlenie'>";
                    $temp = $row['img'];
                    echo "<div class='imgPreview'><img src='photos/" . $temp . "'></div>";
                    echo "<span class='link'><a href='advert.php?id=" . $row['id_ad'] . "'>" . $row['title'] . "</a></span>";
                    echo "<div class='adsType' id='type'>Type: " . $type . "</div>";
                    echo "<div class='adsCategory' id='category'>Category: " . $categ . "</div>";
                    echo "<div class='create_data'>" . $row['create_data'] . "</div>";
                    echo "<div class='cost'>" . $row['cost'] . "$</div>";
                    echo "</div>";
                    echo "<br/>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
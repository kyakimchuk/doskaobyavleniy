<?php
$connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
$mas2 = $connection->query('SELECT title,cost,img_url,create_data FROM ads');
/*while ($row = $mas2->fetch()) {
    echo $row['title'] . "<br>";
    echo $row['cost'] . "<br>";
    echo $row['img_url'] . "<br>";
}*/
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <style>
        .headers {
            position: relative;
            text-align: center;
            top: 100px;
        }

        img {
            width: 150px;
        }

        .objavleniya {
            position: relative;
            top: 150px;
            left: 250px;
            background: greenyellow;
            width: 900px;
        }

        .obyavlenie {
            background: lightgrey;
            width: 900px;

        }

        .link {
            position: relative;
            left: 0px;
            top: -100px;
        }
        .create_data {
            position:absolute;
        }

    </style>
</head>
<body>
<div class="headers">
    <a href="registration.php">Register</a>
    <a href="add_ad.php"> Add an advert</a>
    <a href="">Go to profile</a>
</div>
<div class="objavleniya">
    <h2>Ads</h2>
    <?php
    while ($row = $mas2->fetch()) {
        echo "<div class='obyavlenie'>";
        $temp = $row['img_url'];
        echo "<img src='fotos/" . $temp . "'>";
        echo "<a class='link' href=''>" . $row['title'] . "</a>";
        echo "<div class='create_data'>" . $row['create_data'] . "</div>";
        echo $row['cost'] . "$";
        echo "</div>";
        echo "<br/>";
    }
    ?>
</div>
</body>
</html>
<?php
$connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
$mas2 = $connection->query('SELECT title,cost,img_url,create_data FROM ads');
/*while ($row = $mas2->fetch()) {
    echo $row['title'] . "<br>";
    echo $row['cost'] . "<br>";
    echo $row['img_url'] . "<br>";
}*/
?>
<!DOCTYPE html>
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
        <div class="col-md-6 col-md-offset-5 ">
            <header>
                <a href="registration.php"><span class="glyphicon glyphicon-plus"></span>Register</a>
                <a href="add_ad.php"><span class="glyphicon glyphicon-pencil"></span>Add an advert</a>
                <a href=""><span class="glyphicon glyphicon-user"></span>Go to profile</a>
            </header>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row"><h2>Ads</h2></div>
            <div class="row">
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
        </div>
    </div>
</div>
</body>
</html>
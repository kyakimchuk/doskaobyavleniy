<?php
require_once "functions.php";
$functs = new funcs();
$id_ad = $_GET['id'];
$ad_inf = $functs->get_ad($id_ad);
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
    <br>
<a href="index.php"><h4>HOME</h4></a><br><br><br>
    <img class="imageAdvert" src='<?php echo "photos/".$ad_inf["img"];?>'>
<h3><?php echo $ad_inf['title'];?></h3>
<h5>Type: <?php echo $ad_inf['type'];?></h5>
<h5>Category: <?php echo $ad_inf['categ'];?></h5>
<p>Date of creation: <?php echo $ad_inf['create_data'];?></p>
<p>Price: <?php echo $ad_inf['cost']."$";?></p>
<p>Owner email: <?php echo $ad_inf['email'];?></p>

<p>Description: <?php echo $ad_inf['message'];?></p>
</div>
</body>
</html>


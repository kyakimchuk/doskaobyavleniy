<?php
$title = "";
$description = "";
$type = "";
$cat = "";
$cost = "";
$email = "";
$errors = array();
$temp = 0;
$photo_name = "";
$connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
$cresult = $connection->query("SELECT name,id_category FROM categories");
$categories = $cresult->fetchAll();
$ccount = count($categories);
$tresult = $connection->query("SELECT name,id_type FROM types");
$types = $tresult->fetchAll();
$tcount = count($types);
if (isset($_POST["submitbutton"])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $cat = $_POST['cat'];
    $cost = $_POST['cost'];
    $email = $_POST['email'];
    if ($type == 0 || $cat == 0) {
        $temp = 1;
        $errors[] = "Both type and category of advert should be specified";
    }
    if ($type != 0 && $cat != 0) {
        $type_id = $types[$type - 1]["id_type"];
        $cat_id = $categories[$cat - 1]["id_category"];
    }
    if (strlen($title) > 50) {
        $temp = 1;
        $errors[] = "Title length must be no more than 50 symbols";
    }
    if (strlen($description) > 500) {
        $temp = 1;
        $errors[] = "Description length must be no more than 500 symbols";
    }
    if (strlen($cost) > 11) {
        $temp = 1;
        $errors[] = "Cost length must be no more than 11 symbols";
    }
    if (strlen($email) > 50) {
        $temp = 1;
        $errors[] = "Description length must be no more than 50 symbols";
    }
    if ($temp == 0) {
        if (isset($_FILES['adphoto']) && $_FILES['adphoto']['type'] == 'image/jpeg') {
            $new_name = TIME();
            move_uploaded_file($_FILES['adphoto']['tmp_name'], "photos/" . $new_name . ".jpg");
            $photo_name = $new_name . ".jpg";
        } else
            $photo_name = "nophoto.jpg";
        $sql = "INSERT INTO ads ( title, message, type_id, category_id, cost, email, img) VALUES (:title,:description,:type_id,:cat_id,:cost,:email,:img)";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':type_id', $type_id, PDO::PARAM_INT);
        $stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
        $stmt->bindParam(':cost', $cost, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':img', $photo_name, PDO::PARAM_STR);
        $stmt->execute();
        $temp = 2;
    }
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
<?php if ($temp == 2) :
    $title = "";
    $description = "";
    $cost = "";
    $email = "";
endif;
?>
<form method="post" enctype="multipart/form-data">
    <br/>

    <h2>Adding the advert</h2>
    Title: <input type="text" name="title" value="<?php echo $title; ?>" required><br><br>
    Description: <input type="text-area" name="description" value="<?php echo $description; ?>" required><br><br>
    Type:
    <select name="type">
        <option value="0" selected>Choose a type</option>
        <?php
        for ($i = 0; $i < $tcount; $i++) {
            $j = $i + 1;
            echo "<option value='" . $j . "' " . ">" . $types[$i]["name"] . "</option>";
        }
        ?>
    </select><br><br>
    Category:
    <select name="cat">
        <option value="0" selected>Choose a category</option>
        <?php
        for ($i = 0; $i < $ccount; $i++) {
            $j = $i + 1;
            echo "<option value='" . $j . "' " . ">" . $categories[$i]["name"] . "</option>";
        }
        ?>
    </select><br/><br/>
    Cost: <input type="text" name="cost" value="<?php echo $cost; ?>" required><br><br>
    Photo: <input type="file" name="adphoto"/><br/><br/>
    Email: <input type="text" name="email" value="<?php echo $email; ?>" required><br><br>
    <input type="submit" value="Publish" name="submitbutton"/>
</form>
<?php if ($temp == 1) :
    echo "<center><br/>";
    echo "The data is entered incorrectly<br/>Errors:<br/>";
    for ($i = 0; $i < count($errors); $i++) {
        echo $errors[$i] . "<br/>";
    }
    echo "</center>";
endif;
?>
<?php if ($temp == 2) :
    echo "<center><br/>";
    echo "You have successfully added the advert!";
    echo "</center>";
endif;
?>
</body>
</html>

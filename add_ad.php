<?php
$title = "";
$description = "";
$type = "";
$categ = "";
$cost = "";
$email = "";
$errors = array();
$temp = 0;
$connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
$cresult = $connection->query("SELECT name,id_category FROM categories");
$categories = $cresult->fetchAll();
$ccount = count($categories);
$tresult = $connection->query("SELECT name,id_type FROM types");
$types = $tresult->fetchAll();
$tcount = count($types);
if (!empty($_POST) && isset($_POST["submitbutton"])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $categ = $_POST['categ'];
    $cost = $_POST['cost'];
    $email = $_POST['email'];
    $type_id = $types[$type-1]["id_type"];
    $categ_id = $categories[$categ-1]["id_category"];
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
        $sql = "INSERT INTO ads ( title, message, type_id, categ_id cost, email) VALUES (:title,:description,:type_id,:categ_id,:cost,:email)";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':type_id', $type_id, PDO::PARAM_INT);
        $stmt->bindParam(':categ_id', $categ_id, PDO::PARAM_INT);
        $stmt->bindParam(':cost', $cost, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
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
    <?php
    /* if (!empty($_POST)) {
         if (isset($_FILES['photo'])) {
             if ($_FILES['photo']['type'] == 'image/jpeg') {
                 $new_name = TIME();
                 move_uploaded_file($_FILES['photo']['tmp_name'], "testfile" . $new_name . ".jpeg");
             } else {
                 $new_name = "";
             }
         }
     }*/
    ?>
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
    Description: <input type="text-area" name="description" value="<?php echo $description; ?>"><br><br>
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
    <select name="categ">
        <option value="0" selected>Choose a category</option>
        <?php
        for ($i = 0; $i < $ccount; $i++) {
            $j = $i + 1;
            echo "<option value='" . $j . "' " . ">" . $categories[$i]["name"] . "</option>";
        }
        ?>
    </select><br/><br/>
    Cost: <input type="text" name="cost" value="<?php echo $cost; ?>"><br><br>
    Photo: <input type="file" name="photo"/><br/><br/>
    Email: <input type="text" name="email" value="<?php echo $email; ?>"><br><br>
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

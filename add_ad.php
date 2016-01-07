<html>
<head>
    <meta charset="utf-8">
    <?php

    include "db.php";
    $cats = array(
        "1" => "val1",
        "2" => "val2",
    );
    $ps = array(
        "1" => "val1",
        "2" => "val2",
    );
    $username = "";
    $title = "";
    $ad = "";
    $category = 0;
    $cost = "";
    $p="";

    if (!empty($_POST)) {
        $username = $_POST["username"];
        $title = $_POST["adTitle"];
        $ad = $_POST["ad"];
        $category = intval($_POST["category"]);
        /* if (!isset($cats[$category])) {
             $errors['category'] = true;
         }*/
        $cost = floatval($_POST["cost"]);
        // var_dump($_POST);

        if (isset($_FILES['photo'])) {
            if ($_FILES['photo']['type'] == 'image/jpeg') {
                $new_name = TIME();
                move_uploaded_file($_FILES['photo']['tmp_name'], "testfile" . $new_name . ".jpeg");
            } else {
                $new_name = "";
            }
        }
        /*
        if (count($errors) == 0) {
            $notice = array();
            $notice['username'] = $username;
            $notice['title'] = $title;
            $notice['ad'] = $ad;
            $notice['category'] = $category;
            $notice['cost'] = $cost;
            $notice['userip'] = $_SERVER['REMOTE_ADDR'];
        }
        var_dump ($notice);
        */
        /*$ad = new Ads();
        $ad->username = $_POST['username'];
        $ad->title = $_POST['AdTitle'];
        $ad->message = $_POST['ad'];
        $ad->category_id = $_POST['category'];
        $ad->type_id = $_POST['type'];
        $ad->cost = $_POST['cost'];
        $ad->img_url = $_POST['photo'];
        $ad1 = new Ads1 ();
        $ad1->save();*/
        //Ads1::save_static();
    }
    ?>
</head>
<body>
<a href="registration.php">Register</a>
<form method="post" enctype="multipart/form-data">
    Username: <input type="text" name="username" value="<?php echo $username; ?>"> <br><br>
    <!--
    php:
     if (!empty($_POST))
         if (isset($errors["username"])) {
             echo "<p class='error'>Vvedite username</p>";
         }
     -->
    AdTitle: <input type="text" name="adTitle" value="<?php echo $title; ?>"> <br><br>
    Ad: <input type="text-area" name="ad" value="<?php echo $ad; ?>"> <br><br>
    Category:
    <?php

    ?>
    <select name="category">
        <option value="0" selected>Vyberite kategoriu</option>
        <?php
        foreach ($cats as $k => $v) {
            $select = "";
            if ($category==$k)
            $select="selected";
            echo "<option value='" . $k . "' " . $select . ">" . $v . "</option>";
        } ?>
    </select>
    <br/><br/>
    Type:
    <select name="type">
        <option value="0" selected>Vyberite typ</option>
        <?php
        foreach ($ps as $ke => $va) {
            $select = "";
            if ($p == $ke)
                $select1 = "selected";
            echo "<option value='" . $ke . "' " . $select1 . ">" . $va . "</option>";
        } ?>
    </select>
    <br><br>
    Cost: <input type="text" name="cost" value="<?php echo $cost; ?>">
    <br><br>
    <input type="file" name="photo"/> <br/><br/>
    <input type="submit" value="Save" name="submit-form"/>
</form>
</body>
</html>

<?php
if (isset($_FILES['adphoto']) && $_FILES['adphoto']['type'] == 'image/jpeg') {
    //$_FILES['adphoto']['tmp_name']='fotos\\';
    // echo $_FILES['adphoto']['tmp_name'];
    //$new_name = TIME();
    move_uploaded_file($_FILES['adphoto']['tmp_name'], "fotos/bjbj.jpg");
}
?>
<html>
<head>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    Photo: <input type="file" name="adphoto"/><br/><br/>
    <input type="submit" value="Submit" name="submitbutton"/>
</form>
</body>
</html>

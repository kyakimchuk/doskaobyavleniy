<?php
$login="";
$pass="";
$rpass="";
$name="";
$surname="";
$email="";
$errors=array();
$temp=0;
$connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
if (isset($_POST["submitbutton"])){
    $login=$_POST['login'];
    $pass=$_POST['pass'];
    $rpass=$_POST['rpass'];
    $name=$_POST['name1'];
    $surname=$_POST['surname'];
    $email=$_POST['email'];
    if (strlen($login)>50) {
        $temp=1;
        $errors[] = "Login length must be no more than 50 symbols";
    }
    $loginlist = $connection->query('SELECT login FROM memberlist');
    while ($row = $loginlist->fetch())
    {
        if ($row['login']==$login) {
            $temp=1;
            $errors[] = "This login already exists";
        }
    }
    if (strlen($pass)>50) {
        $temp=1;
        $errors[] = "Password length must be no more than 50 symbols";
    }
    if ($pass!=$rpass) {
        $temp=1;
        $errors[] = "Password mismatch";
    }
	if (strlen($name)>50) {
        $temp=1;
        $errors[] = "Name length must be no more than 50 symbols";
    }
	if (strlen($surname)>50) {
        $temp=1;
        $errors[] = "Surname length must be no more than 50 symbols";
    }
	if (strlen($email)>50) {
        $temp=1;
        $errors[] = "Email length must be no more than 50 symbols";
    }
    if ($temp==0) {
        $hashed_pass=md5($pass);
        $sql = "INSERT INTO memberlist ( login, pass, name, surname, email) VALUES (:login,:pass,:name,:surname,:email)";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $hashed_pass, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $temp=2;
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
	<style>
		form {
			text-align:center;
		}
	</style>
</head>
<body>
<?php if ($temp==2) :
    $login="";
    $pass="";
    $rpass="";
    $name="";
    $surname="";
    $email="";
endif;
?>
<form method="post" enctype="multipart/form-data">
	<br/>
	<h2>Registration</h2>
    Login: <input type="text" name="login" value="<?php echo $login; ?>" required> <br/><br/>
    Password: <input type="password" name="pass" value="<?php echo $pass; ?>" required> <br/><br/>
    Repeat password: <input type="password" name="rpass" value="<?php echo $rpass; ?>" required> <br/><br/>
    Name: <input type="text" name="name1" value="<?php echo $name; ?>" required> <br/><br/>
    Surname: <input type="text" name="surname" value="<?php echo $surname; ?>" required> <br/><br/>
    Email: <input type="text" name="email" value="<?php echo $email; ?>" required> <br/><br/>
    <input type="submit" value="Register" name="submitbutton"/>
</form>
<?php if ($temp==1) : 
	echo "<center><br/>";
	echo "The data is entered incorrectly<br/>Errors:<br/>";
	for ($i=0; $i<count($errors); $i++){
	echo $errors[$i]."<br/>";
	}
	echo "</center>";
	endif;
?>
<?php if ($temp==2) :
    echo "<center><br/>";
    echo "You have successfully registered!";
    echo "</center>";
endif;
?>
</body>
</html>

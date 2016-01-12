<?php

class funcs
{
    function user_exist($login, $password)
    {
        $hashed_pass = md5($password);
        $connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
        $result = $connection->query("SELECT id_member FROM memberlist where login='$login' and pass='$hashed_pass'");
        //var_dump ($result->fetchAll());
        $user_inf = $result->fetchAll();
        if (count($user_inf) == 1)
            return $user_inf[0]['id_member'];
        else return false;
    }

    function login($user_id)
    {
        session_start();
        $_SESSION["user_id"] = $user_id;
    }
    function logout()
    {
        session_start();
        unset($_SESSION['user_id']);
        session_destroy();
    }
    function get_ad($id_ad)
    {
        $connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
        $result = $connection->query("SELECT * FROM ads where id_ad='$id_ad'")->fetch();
        $categ_id = $result["category_id"];
        $type_id = $result["type_id"];
        $categ = $connection->query("SELECT name FROM categories where id_category='$categ_id'")->fetchColumn();
        $type = $connection->query("SELECT name FROM types where id_type='$type_id'")->fetchColumn();
        $result["categ"] = $categ;
        $result["type"] = $type;
        return $result;
    }
    function get_user($id_user)
    {
        $connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
        $result = $connection->query("SELECT * FROM memberlist where id_member='$id_user'")->fetch();
        return $result;
    }
    function get_user_login($id_user)
    {
        $connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
        $result = $connection->query("SELECT login FROM memberlist where id_member='$id_user'")->fetchColumn();
        return $result;
    }
    function get_user_email($id_user)
    {
        $connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
        $result = $connection->query("SELECT email FROM memberlist where id_member='$id_user'")->fetchColumn();
        return $result;
    }
    function get_type($id_type)
    {
        $connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
        $type = $connection->query("SELECT name FROM types where id_type='$id_type'")->fetchColumn();
        return $type;
    }

    function get_categ($id_category)
    {
        $connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
        $categ = $connection->query("SELECT name FROM categories where id_category='$id_category'")->fetchColumn();
        return $categ;
    }

    function get_user_ads($user_email)
    {
        $connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
        $result = $connection->query("SELECT * FROM ads where email='$user_email'")->fetchAll();
        return $result;
    }
}



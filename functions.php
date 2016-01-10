<?php

class funcs
{
    function user_exist($login, $password)
    {
        $hashed_pass=md5($password);
        $connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
        $result = $connection->query("SELECT id_member FROM memberlist where login='$login' and pass='$hashed_pass'");
        //var_dump ($result->fetchAll());
        $user_inf=$result->fetchAll();
        if (count($user_inf) == 1)
            return $user_inf[0]['id_member'];
        else return false;
    }

    function login($user_id, $login, $password)
    {
        session_start();
        $_SESSION["user_id"] = $user_id;
    }
}



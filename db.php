<?php
$connection = new PDO('mysql:host=localhost; port=65535; dbname=doskaobyavl', 'root', '');
function connect_to_db(){
    $mas2 = $connection->query('SELECT name FROM types');
    while ($row = $mas2->fetch())
    {
        echo $row['name'] . "\n";
    }
}
?>
<?php
session_start();
if (!empty($_SESSION["user_id"]))
    echo "вы залогинены";
else echo "вы не залогинены";
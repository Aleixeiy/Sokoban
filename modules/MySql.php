<?php

function MySqlConnect()
{
    $host = 'localhost';
    $user = 'USER WAS HERE';
    $pass = 'PASSWORD WAS HERE';
    $db_name = 'DB NAME WAS HERE';
    return mysqli_connect($host, $user, $pass, $db_name);
}
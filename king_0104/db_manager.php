<?php
// DBサーバへの接続
function getDB() : PDO {
    $dsn = 'mysql:dbname=user_Info;host=mysql;charset=utf8';
    $usr = 'root';
    $passwd = 'root';

    $db = new PDO($dsn, $usr, $passwd);
    return $db;
}

?>
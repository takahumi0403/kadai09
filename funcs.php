<?php


// DB接続の関数
// return を入れて、functionの外でも使えるようにする
function db_conn()
{
    try{
        $db_name = 'gs_php02_kadai';
        $db_id   = 'root';
        $db_pw   = '';
        $db_host = 'localhost';
        $pdo = new PDO('mysql:dbname='. $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }

}

?>
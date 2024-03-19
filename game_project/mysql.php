<?php

// 資料庫連接資訊

$servername = "localhost";
$username = "root";
$password = "Gordonhsu";
$dbname = "game";

// 建立連接
$dblink = new mysqli($servername, $username, $password, $dbname);

// 檢查連接是否成功
if ($dblink->connect_error) {
    die ("Connection failed: " . $dblink->connect_error);
} else {
    echo "Connected successfully!";
}

// 在此處進行資料庫操作

// // 關閉連接
// $db->close();

?>
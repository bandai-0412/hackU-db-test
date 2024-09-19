<?php
require_once('./config/DBConfig.php');
$data;

$dataList = [];

try {
    // DBへ接続
    $dbh = new PDO(App\DBConfig::dsn, App\DBConfig::user, App\DBConfig::password);
    $name = $_GET["name"];
    //$type = $_GET["type"];
    $age = $_GET["age"];

    // クエリの実行
    $query = "UPDATE test SET age = ? WHERE name = ?";
    //$query->execute([$name, $type, $age]);
    $stmt = $dbh->prepare($query);
    $stmt->execute([$age, $name]);
} catch (PDOException $e) {
    print("データベースの接続に失敗しました" . $e->getMessage());
    die();
}

// 接続を閉じる
$dbh = null;

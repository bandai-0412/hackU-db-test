<?php
require_once('./config/DBConfig.php');

try {
    // DBへ接続
    $dbh = new PDO(App\DBConfig::dsn, App\DBConfig::user, App\DBConfig::password);
    $name = $_GET["name"];
    $type = $_GET["type"];
    $age = $_GET["age"];
    // クエリの実行
    $query = "INSERT INTO test (name, type, age) VALUES (?, ?, ?)";
    //$query->execute([$name, $type, $age]);
    $stmt = $dbh->prepare($query);
    $stmt->execute([$name, $type, $age]);

    /*$query = "SELECT * FROM ";
    //$query->execute([$name, $type, $age]);
    $stmt = $dbh->prepare($query);
    $stmt->execute([$name, $type, $age]);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $dataList[] = $row;
    }*/
} catch (PDOException $e) {
    print("データベースの接続に失敗しました" . $e->getMessage());
    die();
}

// 接続を閉じる
$dbh = null;

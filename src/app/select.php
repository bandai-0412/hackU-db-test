<?php

require_once('./config/DBConfig.php');

$dataList = [];
$usrId = $_GET['usrID'];

try {
    // DBへ接続
    $dbh = new PDO(App\DBConfig::dsn, App\DBConfig::user, App\DBConfig::password);

    // クエリの実行
    $query = "SELECT * FROM profile WHERE userID = $usrId";
    $stmt = $dbh->query($query);


    // 表示処理
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $dataList[] = $row;
    }
} catch (PDOException $e) {
    print("データベースの接続に失敗しました" . $e->getMessage());
    die();
}

// 接続を閉じる
$dbh = null;
?>

<?php
for ($i = 0; $i < count($dataList); $i++) {
?>
    <div>
        <?php $data = $dataList[$i]; ?>
        <?php echo $data['userID']; ?>: <?php echo $data['name']; ?>, <?php echo $data['profile'] ?>
        <hr />
    </div>
<?php
}
?>
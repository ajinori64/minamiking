<?php
// DB接続用
require_once('db_manager.php');
// POSTメソッドで送信された値を変数に代入
$id = $_POST['u_id'];
$type = $_POST['u_type'];
$name = $_POST['u_name'];
$pass = $_POST['u_pass'];
// 例外対処
try{
    $pdo = getDB();
    // 重複している学籍番号を抽出
    $sql = "SELECT * FROM login_Info WHERE user_Id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    // 一致するものを$memberにセット
    $member = $stmt->fetchAll(PDO::FETCH_COLUMN);
    // 一致すればログインページ・しなければホームページ
    if ($member != null) {
        //既に存在する学籍番号
        $link = 'signup.php';
    }
    else {
        //新規登録完了
        $link = 'homemenu.php';
        // データの登録処理
        $sql = "INSERT INTO login_Info (user_Id, user_Type, user_Name, user_Pass) VALUES (:id, :type, :name, :pass)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':type', $type);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':pass', $pass);
        $stmt->execute();
    }
    header("Location: {$link}");
}
catch(Exception $e){
    echo "接続失敗：{$e->getMessage()}";
}
?>
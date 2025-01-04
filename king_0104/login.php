<?php
require_once('db_manager.php');
session_start();

$u_id = $_POST['u_id'];
$u_pass = $_POST['u_pass'];

try {
    $pdo = getDB();
}
catch (PDOException $e) {
    echo "connection error：".$e->getMessage();
}
// 入力値と一致する学籍番号を抽出
$sql = "SELECT * FROM login_Info WHERE user_Id = :u_id AND user_Pass = :u_pass";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':u_id', $u_id);
$stmt->bindParam(':u_pass', $u_pass);
$stmt->execute();
// 一致するものを抽出
$member = $stmt->fetch();
if ($member != null) {
    if ($member['user_Id'] == $u_id && $member['user_Pass'] == $u_pass) {
        $msg = "{$member['user_Type']}分野の{$member['user_Name']}さん、ようこそ！";
        $link = 'homemenu.php';
        $_SESSION['u_id'] = $_POST['u_id'];
        $_SESSION['u_pass'] = $_POST['u_pass'];
        //header("Location: {$link}", true, 307);
        //echo "<form id=&#39;fpost&#39; action=&#39;{$link}&#39; method=&#39;post&#39;>";
        //echo "<input type=&#39;hidden&#39; name=&#39;msg&#39; value=&#39;{$msg}&#39;/>";
        //echo "</form>";
        //echo "<script>document.getElementById('fpost').submit();</script>";
        
    }
}
else {
    // セッションを破棄し、入力フォームへリダイレクト
    $_SESSION = array();
    session_destroy();
    $msg = "学籍番号もしくは、パスワードが違います";
    $link = "login_form.php";
}

header("Location: {$link}", true, 307);
?>
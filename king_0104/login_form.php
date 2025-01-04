<?php 
require_once 'encode.php' ;
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ログインぺージ</title>
        <link rel="stylesheet" href="css/loginform.css?<?php echo date('YmdHis'); ?>"/>
    </head>
    <body>
        <div class="block"> 
            <h1>ログインメニュー</h1>
            <form action="login.php" method="post">
            <div class="number">
                <label for="u_id">◆ 学籍番号（半角数字7桁）</label>
            </div>
            <div>
                <input id="u_id" type="text" name="u_id" required class="input" pattern="^[0-9]+$" minlength="7" maxlength="7" autocomplete="off" value="<?=e($_SESSION['u_id'] ?? '')?>" />
            </div>
            <div class="passwd">
                <label for="u_pass">◆ パスワード</label>
            </div>
            <div>
                <input id="u_pass" type="password" name="u_pass" required class="input" autocomplete="off" pattern="^[a-zA-Z0-9]+$" value="<?=e($_SESSION['u_pass'] ?? '')?>" />
            </div>
            <div class="buttonarea">
                <input type="submit" value="ログイン" class="button">
            </div>
            </form>
            <div class="signup">
                <p><a><a href="signup.php" class="signuplink"><b>新規登録</b></a>する</p>
            </div>
        </div>
    </body>
</html>
<?php 
require_once 'encode.php' ;
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>新規登録画面</title>
        <link rel="stylesheet" href="css/signup.css?<?php echo date('YmdHis'); ?>"/>
    </head>
    <body>
        <div class="block">
            <div class="block2">
                <h1>新規登録メニュー</h1>
                <form action="register.php" method="post">
                    <div class="numblock">
                        <label>◆ 学籍番号（半角数字7桁）</label>
                    </div>
                    <div>
                        <input type="text" name="u_id" required autocomplete="off" pattern="^[0-9]+$" minlength="7" maxlength="7" class="input">
                    </div>
                    <div class="radio">
                        <input type="radio" id="two" name="u_type" value="2" required>
                        <label for="two">
                            情報処理学科<br>
                        </label>
                        <input type="radio" id="three" name="u_type" value="3" required>
                        <label for="three">
                            ITスペシャリスト学科<br>
                        </label>
                        <input type="radio" id="four" name="u_type" value="4" required>
                        <label for="four">
                            ITエキスパート学科
                        </label>
                    </div>
                    <div class="nameblock">
                        <label>
                            ◆ ユーザ名（半角英数字12字以内）
                        </label>
                    </div>
                    <div>
                        <input type="text" name="u_name" required autocomplete="off" pattern="^[a-zA-Z0-9]+$" maxlength="12" class="input">
                    </div>
                    <div class="passblock">
                        <label>
                            ◆ パスワード（半角英数字8字以上）
                        </label>
                    </div>
                    <div>
                        <input type="password" name="u_pass" required autocomplete="off" pattern="^[a-zA-Z0-9]+$" minlength="8" class="input">
                    </div>
                    <div class="send">
                        <input type="submit" value="登録する" class="sendbutton">
                    </div>
                </form>
                <div class="gologin">
                    <p><a>既に登録済みの方は<a href="login_form.php" class="loginlink"><b>ログイン</b></a></p>
                </div>
            </div>
        </div>
    </body>
    
</html>
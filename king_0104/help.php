<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/homemenu.css?<?php echo date('YmdHis'); ?>"/>
        <title>ホームメニュー</title>
    </head>
    <body>
        <div class="block">
            <div class="head"><p class="headtext">ヘルプページ</p></div>
            <div class="main">
                <div class="side">
                    <div class="items">
                        <div class="itemcontents">
                            <p>ホーム</p>
                        </div>
                        <div class="itembutton">
                            <button onclick="location.href='homemenu.php'"></button>
                        </div>
                    </div>
                    <div class="items">
                        <div class="itemcontents">
                            <p>カレンダー</p>
                        </div>
                        <div class="itembutton">
                            <button onclick="location.href='calendar.php'"></button>
                        </div>
                    </div>
                    <div class="items">
                        <div class="itemcontents">
                            <p>就職活動</p>
                        </div>
                        <div class="itembutton">
                            <button onclick="location.href='jobguide.php'"></button>
                        </div>
                    </div>
                    <div class="items">
                        <div class="itemcontents">
                            <p>学内イベント</p>
                        </div>
                        <div class="itembutton">
                            <button onclick="location.href='campusevent.php'"></button>
                        </div>
                    </div>
                    <div class="items">
                        <div class="itemcontents">
                            <p>ヘルプ</p>
                        </div>
                        <div class="itembutton">
                            <button onclick="location.href='help.php'"></button>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="maincontent">基本的な操作やボタンの役割の説明</div>
                    <div class="foot">
                        <div class="jump">
                            <button onclick="location.href='#'" class="footbutton"><div class="foottext">TOPに戻る</div></button>
                        </div>
                        <div class="logout">
                            <button onclick="location.href='homemenu.php'" class="footbutton"><div class="foottext">ホーム</div></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
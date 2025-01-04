<?php 
// タイムゾーン
date_default_timezone_set('Asia/Tokyo');

// 前月・次月リンクが選択された場合、GETメソッドより年月取得
if(isset($_GET['ym'])){
    $ym = $_GET['ym'];
}
else {
    // 今年の年月
    $ym = date('Y-m');
}

// タイムスタンプ(基準にする時刻)を作成し、フォーマットをチェック
// strtotime('Y-m-01')
$timestamp = strtotime($ym . '-01');
// エラー対策の形式チェック
if ($timestamp === false) {
    // 現在の年月・タイムスタンプを取得
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// 今日の日付 フォーマット：2025-1-4
$today = date('Y-m-j');

// カレンダーのタイトル作成 2025年1月
// date(表示内容, 時刻の基準)
$html_title = date('Y年n月', $timestamp);

// 前月・次月の年月を取得
// strtotime(, 基準)
$prev = date('Y-m', strtotime('-1 month', $timestamp));
$next = date('Y-m', strtotime('+1 month', $timestamp));

// 該当月の日数を取得
$daycount = date('t', $timestamp);

// 1日が何曜日か
$elementday = date('w', $timestamp);

// カレンダー作成の準備
$weeks = [];
$week = '';

// 第1週目：空のセルを追加
// str_repeat(文字列, 反復回数)
$week .= str_repeat('<td></td>', $elementday);

for ($day = 1; $day <= $daycount; $day++, $elementday++) {
    
    $date = $ym . '-' . $day;   // 2020-00-00

    if ($today == $date) {
        // 今日の場合、classにtodayをつける
        $week .= '<td class="today">' . $day;
    }
    else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';
    // 週終わり、月終わり
    if ($elementday % 7 == 6 || $day == $daycount) {
        // 土曜日を取得
        if ($day == $daycount) {
            $week .= str_repeat('<td></td>', 6 - ($elementday % 7));
        }
        // 配列weeksにtrと$weekを追加
        $weeks[] = '<tr>' . $week . '</tr>';
        // weekをリセット
        $week = '';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/calendar.css?<?php echo date('YmdHis'); ?>"/>
        <title>カレンダー</title>
    </head>
    <body>
    <div class="head"><p class="headtext">カレンダー</p></div>
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
            <div class="block">
                <p class="month"><a href="?ym=<?php echo $prev; ?>" style="text-decoration: none;"><< </a><?php echo $html_title; ?><a href="?ym=<?php echo $next; ?>" style="text-decoration: none;"> >></a></p>
                <div class="tablearea">
                    <table class="table">
                        <tr>
                            <th>日</th>
                            <th>月</th>
                            <th>火</th>
                            <th>水</th>
                            <th>木</th>
                            <th>金</th>
                            <th>土</th>
                        </tr>
                        <?php
                            foreach ($weeks as $week) {
                                echo $week;
                            }
                        ?>
                    </table>
                </div>
            </div>
            <div class="foot">
                <div class="jump">
                    <button onclick="location.href='homemenu.php'" class="footbutton"><div class="foottext">ホーム</div></button>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
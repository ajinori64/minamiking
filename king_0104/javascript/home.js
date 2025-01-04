// ヘルプ内容の辞書
const helpContents = {
    "使い方": "このアプリケーションの使い方を説明します。",
    "設定": "設定メニューの詳細について。",
    "トラブルシューティング": "問題を解決する方法。",
    "サポート": "サポート情報はこちらです。"
};

// 検索ボタンのクリックイベント
document.getElementById('search-button').addEventListener('click', function () {
    const input = document.getElementById('search-input').value.trim();
    const help = document.getElementById('help');

    if (input === "ヘルプ" || input.toLowerCase() === "help") {
        help.textContent = "何もない";
        help.style.display = "block";
    } else if (helpContents[input]) {
        help.textContent = helpContents[input];
        help.style.display = "block";
    } else {
        help.textContent = "該当する結果が見つかりませんでした。";
        help.style.display = "block";
    }
});

// ヘルプボタンのクリックイベント
document.getElementById('help-button').addEventListener('click', function () {
    const help = document.getElementById('help');
    help.textContent = "何もない";
    help.style.display = "block";
});

// ホームボタンのクリックイベント
document.getElementById('home-button').addEventListener('click', function () {
    const help = document.getElementById('help');
    const searchInput = document.getElementById('search-input');
    help.textContent = "ホーム";
    searchInput.value = "";
});

// カレンダーボタンのクリックイベント
document.getElementById('aaa-button').addEventListener('click', function () {
    // カレンダーを別タブで開く
    const calendarURL = "https://calendar.google.com/calendar/embed?src=kd1364830%40st.kobedenshi.ac.jp&ctz=Asia%2FTokyo";
    window.open(calendarURL, "_blank");
});

// 見た感じ、開始年と終了年までの範囲を持つoption要素を生成する？
// 関数の説明
function generate_year_range(start, end) {
    var years = "";
    for (var year = start; year <= end; year++) {
        years += "<option value='" + year + "'>" + year + "</option>";
    }
    return years;
}

// この辺ざっくり説明あると助かる
var today = new Date();
var currentMonth = today.getMonth();
var currentYear = today.getFullYear();
var selectYear = document.getElementById("year");
var selectMonth = document.getElementById("month");
var createYear = generate_year_range(1995, 2050);

document.getElementById("year").innerHTML = createYear;

var calendar = document.getElementById("calendar");
var lang = calendar.getAttribute('data-lang');

var months = ["1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月",];
var days = ["日","月","火","水","木","金","土"];

var dayHeader ="<tr>";

// カレンダーをつくっているのかな？ 説明あると助かる
for (day in days) {
    dayHeader += "<th data-days='" + days[day] + "'>" + days[day] +"</th>";
}

dayHeader += "</tr>";

document.getElementById("thead-month").innerHTML = dayHeader;

monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);

// 関数の説明
function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}

// 関数の説明
function prev() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

// 関数の説明
function jump() {
    currentYear = parseInt(selectYear.value); 
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear); 
}

// 関数の説明
// 引数の説明
function showCalendar(month, year) {  
    
    var firstDay = ( new Date( year, month, ) ).getDay();

    tbl = document.getElementById("calendar-body");
    tbl.innerHTML = "";

    monthAndYear.innerHTML = year + "年 " + months[month] ;
    selectYear.value = year;
    selectMonth.value = month;

    var date = 1;
    
    // 大まかな説明（何をする処理か）
    for (var i = 0; i < 6; i ++) {
        var row = document.createElement("tr");

        // 大まかな説明
        for ( var j = 0; j < 7; j++ ) {
            if ( i === 0 && j <firstDay) {
                cell = document.createElement("td");
                cellText = document.createTextNode(""); 
                cell.appendChild(cellText);
                row.appendChild(cell);
            } 
            else if (date > daysInMonth(month, year)) { 
                break;
            } 
            else {
                cell = document.createElement("td");
                cell.setAttribute("data-date", date);
                cell.setAttribute("data-month", month + 1);
                cell.setAttribute("data-year", year);
                cell.setAttribute("data-month_name", months[month]);
                cell.className = "date-picker";
                cell.innerHTML = "<span>" + date + "</span>";

                if ( date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.className = "date-picker selected";
                }
                
                row.appendChild(cell); 
                date++;
            }
        }
        tbl.appendChild(row);
    }
}

// 関数の説明
// 引数と戻値の説明
function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}

// 「トップへ戻る」ボタンのクリックイベント
document.querySelector('.pagetop__arrow ').addEventListener('click', function (event) {
    
    event.preventDefault(); // デフォルトのリンク動作を無効化
    
    const scrollableArea = document.getElementById('scrollable-area');
    
    scrollableArea.scrollTo({
        top: 0, // スクロール領域の先頭
        behavior: 'smooth' // スムーズスクロール
    });

});

// 「トップへ戻る」ボタンのクリックイベント
document.querySelector('.pagetop').addEventListener('click', function (event) {
    event.preventDefault(); // デフォルトのリンク動作を無効化
    const scrollableArea = document.getElementById('scrollable-area');
    scrollableArea.scrollTo({
        top: 0, // スクロール領域の先頭
        behavior: 'smooth' // スムーズスクロール
    });
});
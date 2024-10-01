<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>寵物醫院管理系統 - README</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1, h2, h3 {
            color: #333;
        }
        code {
            background-color: #eaeaea;
            padding: 2px 5px;
            border-radius: 3px;
            font-family: monospace;
        }
        pre {
            background-color: #f8f8f8;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <h1>寵物醫院管理系統</h1>
    <p>本專案是一個專為寵物醫院設計的管理系統，旨在幫助寵物醫院有效地管理預約、客戶資料及醫療記錄，並提供良好的用戶體驗。</p>

    <h2>功能特色</h2>
    <ul>
        <li><strong>會員系統</strong>：通過 Laravel 的 Middleware 實現會員登入與權限控管。</li>
        <li><strong>預約系統</strong>：用戶登入後可以選擇當週可用的預約時間，系統會自動排除醫師休假日，確保只能選擇有效時段。</li>
        <li><strong>醫療記錄管理</strong>：醫生可以方便地記錄並查詢寵物的病歷資料。</li>
        <li><strong>圖表展示</strong>：使用 ChartJS 來視覺化展示資料，例如預約狀況或病歷統計。</li>
        <li><strong>圖片管理</strong>：使用 Lightbox 提供照片檢視功能。</li>
        <li><strong>富文本編輯器</strong>：採用 CKEditor 讓後端可以輕鬆撰寫和編輯醫師基本資料。</li>
    </ul>

    <h2>技術棧</h2>
    <h3>前端</h3>
    <ul>
        <li>HTML5, CSS3</li>
        <li>JavaScript, jQuery</li>
        <li>Lightbox (圖片展示)</li>
        <li>ChartJS (圖表展示)</li>
        <li>CKEditor (富文本編輯器)</li>
    </ul>

    <h3>後端</h3>
    <ul>
        <li>Laravel (PHP 框架)</li>
        <li>MySQL (資料庫)</li>
    </ul>

    <h3>會員系統</h3>
    <ul>
        <li>使用 Laravel 的 Middleware 進行身份驗證和授權控制。</li>
    </ul>

</body>
</html>

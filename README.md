# 寵物醫院管理系統

<div>
    <img src="https://github.com/user-attachments/assets/6be205d8-8de7-48a5-933c-eeda719b9e45" style="width:1000px" alt="寵物醫院標誌" />    
</div>




本專案是一個專為寵物醫院設計的管理系統，旨在幫助寵物醫院有效地管理預約、客戶資料及醫療記錄，並提供良好的用戶體驗。

## 功能特色

- **會員系統**：通過 Laravel 的 Middleware 實現會員登入與權限控管。
- **預約系統**：用戶登入後可以選擇當週可用的預約時間，系統會自動排除醫師休假日，確保只能選擇有效時段。
- **醫療記錄管理**：醫生可以方便地記錄並查詢寵物的病歷資料。
- **圖表展示**：使用 ChartJS 來視覺化展示資料，例如預約狀況或病歷統計。
- **圖片管理**：使用 Lightbox 提供照片檢視功能。
- **富文本編輯器**：採用 CKEditor 讓後端可以輕鬆撰寫和編輯醫師基本資料。

## 技術棧

### 前端

- HTML5, CSS3
- JavaScript, jQuery
- Lightbox (圖片展示)
- ChartJS (圖表展示)
- CKEditor (富文本編輯器)

### 後端

- Laravel (PHP 框架)
- MySQL (資料庫)

### 會員系統

- 使用 Laravel 的 Middleware 進行身份驗證和授權控制。

## 預約系統開發過程

在開發預約系統的過程中，我們考慮了用戶和管理者的便利性：
自動更新日期：系統會自動在每天00:00時更新網頁中的第一天日期為當前日期，並生成接下來一週的日期，避免手動更改時間的麻煩。
後端控制醫生休假：醫生的休假時間由後端管理，並在前端動態排除這些休息時間。用戶只能選擇醫生可用的預約時段，這保證了時間管理的準確性和靈活性。

<div style="display: flex; justify-content: space-between;">
    <img src="https://github.com/user-attachments/assets/aa89ff67-44e8-4fc6-98ea-b53e734433c9" style="width: 300px; margin-right: 10px;" alt="寵物醫院標誌" />
    <img src="https://github.com/user-attachments/assets/078fac91-11a4-41ff-ba33-0f0f89ec458e" style="width: 300px; margin-right: 10px;" alt="寵物醫院標誌" />
    <img src="https://github.com/user-attachments/assets/4dcf3e2d-5805-44b5-a7f2-1b3bba65e6d7" style="width: 300px;" alt="寵物醫院標誌" />
</div>



# 寵物醫院管理系統

<div>
    <img src="https://github.com/user-attachments/assets/f41b686b-4631-4bbe-add8-bd4f1914d0b3" style="width:1000px" alt="寵物醫院標誌" />    
</div>


這是一個基於 Laravel 框架開發的醫療預約與管理系統，提供用戶預約醫師、後台管理、數據分析等功能，並具備良好的安全性與資料庫優化設計。

## 功能特色

### 用戶預約系統
- **醫師與科別預約**：用戶可根據不同醫師和科別進行預約。
- **自動化更新**：系統自動顯示醫師休息時間及預約額滿狀態。
<div style="display: flex; justify-content: space-between;">
    <img src="" style="width: 300px; margin-right: 30px;" alt="寵物醫院標誌" />
</div>

### 後台管理
- **醫師資訊管理**：編輯醫師資訊、科別介紹、診間時間等。
- **班表編輯**：支持按日期搜尋並編輯該月份的班表，包括醫師休息時間。
<div style="display: flex; justify-content: space-between;">
    <img src="" style="width: 300px; margin-right: 30px;" alt="寵物醫院標誌" />
    
</div>
### 內容編輯
- **CKEditor**：提供豐富的內文編輯功能。
- **Lightbox**：方便檢視照片。
<div style="display: flex; justify-content: space-between;">
    <img src="" style="width: 300px; margin-right: 30px;" alt="寵物醫院標誌" />
</div>

### 數據分析
- **ChartJS**：將數據視覺化，幫助管理者了解運營狀況。
<div style="display: flex; justify-content: space-between;">
    <img src="" style="width: 300px; margin-right: 30px;" alt="寵物醫院標誌" />
</div>

### 安全性
- **驗證碼**：防止惡意登錄。
- **Session 與 CSRF Token**：防止 XSS 與 CSRF 攻擊。
<div style="display: flex; justify-content: space-between;">
    <img src="" style="width: 300px; margin-right: 30px;" alt="寵物醫院標誌" />
</div>

### 權限控管
- **Laravel Middleware**：實現會員後台登入與權限管理。

### 資料庫優化
- **Carbon**：使用 Laravel 內建的 Carbon 庫在前端顯示日期，減少資料庫儲存需求。

## 技術棧
- **後端框架**：Laravel
- **前端工具**：ChartJS、CKEditor、Lightbox
- **安全性**：驗證碼、CSRF Token、Session 管理
- **資料庫**：MySQL（或其他支援的資料庫）

### 會員系統

- 使用 Laravel 的 Middleware 進行身份驗證和授權控制。

## 預約系統開發過程

在開發預約系統的過程中，我們考慮了用戶和管理者的便利性：
自動更新日期：系統會自動在每天00:00時更新網頁中的第一天日期為當前日期，並生成接下來一週的日期，避免手動更改時間的麻煩。
後端控制醫生休假：醫生的休假時間由後端管理，並在前端動態排除這些休息時間。用戶只能選擇醫生可用的預約時段，這保證了時間管理的準確性和靈活性。

<div style="display: flex; justify-content: space-between;">
    <img src="https://github.com/user-attachments/assets/aa89ff67-44e8-4fc6-98ea-b53e734433c9" style="width: 300px; margin-right: 30px;" alt="寵物醫院標誌" />
    <img src="https://github.com/user-attachments/assets/078fac91-11a4-41ff-ba33-0f0f89ec458e" style="width: 300px; margin-right: 30px;" alt="寵物醫院標誌" />
    <img src="https://github.com/user-attachments/assets/4dcf3e2d-5805-44b5-a7f2-1b3bba65e6d7" style="width: 300px;" alt="寵物醫院標誌" />
</div>



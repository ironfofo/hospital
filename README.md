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
    <img src="https://github.com/user-attachments/assets/7abcf7fc-a801-4f18-8613-cdfb3315c67f" style="width: 1000px; margin-right: 30px;" alt="寵物醫院標誌" />
</div>

### 後台管理
- **會員管理**：使用 Laravel 的 Middleware 進行身份驗證和授權控制，編輯會員資訊、權限。
- **醫師資訊管理**：編輯醫師資訊、科別介紹、診間時間等。
- **班表編輯**：支持按日期搜尋並編輯該月份的班表，包括醫師休息時間。
<div style="display: flex; justify-content: space-between;">
    <img src="https://github.com/user-attachments/assets/f628e748-093c-4184-980c-8a53fbe6660f" style="width: 1000px; margin-right: 30px alt="寵物醫院標誌" />
    <img src="https://github.com/user-attachments/assets/7ef3e23e-a416-40d3-9635-642c59ccd8d8" style="width: 1000px; margin-right: 30px;" alt="寵物醫院標誌" />
</div>

### 內容編輯
- **CKEditor**：提供豐富的內文編輯功能。
- **Lightbox**：方便檢視照片。
<div style="display: flex; justify-content: space-between;">
    <img src="https://github.com/user-attachments/assets/b830b97e-7b6e-452f-ba82-b8d241347f15" style="width: 1000px; margin-right: 30px;" alt="寵物醫院標誌" />
    <img src="https://github.com/user-attachments/assets/81a92df1-d1ac-4ea0-885b-ab2082cec521" style="width: 1000px; margin-right: 30px;" alt="寵物醫院標誌" />
</div>

### 數據分析
- **ChartJS**：將數據視覺化，幫助管理者了解運營狀況。
<div style="display: flex; justify-content: space-between;">
    <img src="https://github.com/user-attachments/assets/89d5e391-e7c1-4d73-bb22-730d7f7da672" style="width: 1000px; margin-right: 30px;" alt="寵物醫院標誌" />
</div>

### 安全性
- **驗證碼**：防止惡意登錄。
- **Session 與 CSRF Token**：防止 XSS 與 CSRF 攻擊。
<div style="display: flex; justify-content: space-between;">
    <img src="https://github.com/user-attachments/assets/3818df21-713d-4a38-a473-3b9be9fd0912" style="width: 1000px; margin-right: 30px;" alt="寵物醫院標誌" />
    <img src="https://github.com/user-attachments/assets/0921ba3c-6678-4606-a7b1-290a3f9a42c9" style="width: 1000px; margin-right: 30px;" alt="寵物醫院標誌" />
</div>

### 權限控管
- **Laravel Middleware**：實現會員後台登入與權限管理。

### 資料庫優化
- **Carbon**：使用 Laravel 內建的 Carbon 庫在前端顯示日期，減少資料庫儲存需求。

## 技術棧
- **後端框架**：Laravel
- **前端工具**：ChartJS、CKEditor、Lightbox、CSS3、bootstrap、sweetAlert、javaScript、jQuery
- **安全性**：驗證碼、CSRF Token、Session 管理
- **資料庫**：MySQL（或其他支援的資料庫）






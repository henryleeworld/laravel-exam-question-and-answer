# Laravel 7 測驗問題和答案

測驗題目及建立題庫，能有效評估學習成效，用來測試是否具備應有的相關能力，進而落實終身學習的教育理念。Laravel 7 測驗問題和答案主要是用的 [QuickAdminPanel](https://quickadminpanel.com) 生成的，除了一些定制代碼，可依需求彈性改造的工具。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產⽣ Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 執行 __npm__ 指令的 __install__ 來執行安裝專案引用的依賴套件。
```sh
$ npm install
```
- 執行 __npm__ 指令的 __run__ 來執行開啟開發環境服務。
```sh
$ npm run dev
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/login` 來進行登入，預社的電子郵件和密碼分別為 __admin@admin.com__ 和 __password__ 。

----

## 畫面截圖
![](https://i.imgur.com/vexMiyZ.png)
> 藉由問題的建立，可以在任何時間、任何地方，想測驗就測驗，簡便又迅速

![](https://i.imgur.com/VFiynIU.png)
> 新增每個題目及答案，並依需要寫上詳解
# 確認テスト2＿もぎたて
## 環境構築
### Dockerビルド
  1. git clone git@github.com:toco73/check-test2.git  
  2. DockerDesktopアプリを立ち上げる  
  3. docker compose up -d --build  
 ＊MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。

 ### Laravel環境構築
  1. docker compose exec php bash  
  2. composer install  
  3. .env.exsampleファイルから.envを作成し、以下の環境変数を変更追加  
     DB_CONNECTION=mysql  
     DB_HOST=mysql  
     DB_PORT=3306  
     DB_DATABASE=laravel_db  
     DB_USERNAME=laravel_user  
     DB_PASSWORD=laravel_pass  
  4.アプリケーションキーの作成   
     php artisan key:generate  
  5.マイグレーションの実行  
      php artisan migrate  
  6.シーディングの実行  
     php artisan db:seed  
     
## 使用技術(実行環境)
　・PHP7.4.9  
  ・Laravel8.83.29  
  ・MySQL8.0.26  

## ER図
![er-diagram](https://github.com/user-attachments/assets/1d1c487e-4014-404f-b6f9-06de543964e3)

## URL
・開発環境：http://localhost/  
・phpMyAdmin：http://localhost:8080/

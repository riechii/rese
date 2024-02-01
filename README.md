# Rese
飲食店予約アプリです。会員登録することで予約、予約変更、口コミ投稿等することができます。
![Rese_top](https://github.com/riechii/rese/blob/main/Rese_top.png)
## 作成した目的
laravel学習のために制作しました。成果物の機能やイメージをいただきそれに沿って作成しました。
## 機能一覧
・店舗一覧(会員登録しなくても見れます。)

・会員登録機能(名前、メールアドレス、パスワード)

・メール認証機能(会員登録後メールが送られてきます。)

・ログイン(メールアドレス、パスワードで認証)

・ログアウト

・店舗検索

　エリア、ジャンル、店舗名で検索できます。

・予約機能

　店舗詳細ページから予約ができます。また、マイページからは予約の変更ができます。

・お気に入り登録

　お気に入りに登録した店舗はマイページから確認できます。

・口コミ

　５段階評価の口コミの閲覧ができます。また、その店舗を予約した方のみ予約時間が過ぎたら口コミの投稿ができます。

・決済機能

　予約時にstripeにて決済をすることができます。

・QRコード

　マイページにてQRコードが発行され、お店側は照合することができます。

・権限

　管理者と店舗代表者と利用者の3つの権限があり、店舗代表者が店舗情報の作成、更新と予約情報の確認、お知らせメールを送る事ができるようになっています。また管理者側は店舗代表者を作成と、店舗代表者のできることもできるようになっています。

・リマインダーメール

　予約のある日の当日の朝９時にリマインダーメールを来るようになっています。

## 使用技術(実行環境)
・laravel 8.83.8

・mysql 8.0.26

・PHP 7.4.9

## テーブル設計
![Rese_table](https://github.com/riechii/rese/blob/main/Rese_table.png)
## ER図
![Rese_er](https://github.com/riechii/rese/blob/main/Rese_er.png)
## 環境構築
①laravelプロジェクトを実行したいディレクトリに移動

②$ git clone git@github.com:riechii/rese.git .

③$ docker-compose up -d --build

④Dockerのコンテナに入る $ docker-compose exec php bash

⑤composerをインストール　$ composer install

⑥.evnの作成　$ cp .env.example .env

⑦APP_KEYを作成　$ php artisan key:generate

⑧.envの設定を変える

DB_HOST=DBコンテナのサービス名、 DB_DATABASE、DB_USERNAME、DB_PASSWORD、docker-compose.ymlで作成したデータベース名、ユーザ名、パスワードを記述

STRIPE_KEYとSTRIPE_SECRETも記述

メール設定も行う

⑨テーブル作成　$ php artisan migrate

⑩ダミーデータの作成　$ php artisan db:seed

localhost:80（Nginxコンテナのポートを80にした場合）にアクセスすると表示されます。
## aws
awsではバックエンドをEC2、データベースをRDS(Mysql)、ストレージをS3で作成しております。

57.180.55.146

## 使用技術(実行環境)
・laravel 8.83.8

・mysql 8.0.35

・PHP 8.0.2
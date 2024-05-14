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

　５段階評価の口コミの閲覧ができます。一般ユーザーのみ書き込みと自身が投稿した口コミの編集が可能、削除は管理者は全ての口コミと削除できますが、一般ユーザーは自身の書いた口コミの投稿のみ削除できます。なお、口コミの投稿は各店舗につき１度までとなっています。

・決済機能

　予約時にstripeにて決済をすることができます。

・QRコード

　マイページにてQRコードが発行され、お店側は照合することができます。

・権限

　管理者と店舗代表者と利用者の3つの権限があり、店舗代表者が店舗情報の作成、更新と予約情報の確認、お知らせメールを送る事ができるようになっています。また管理者側は店舗代表者を作成と、csvインポートによる店舗情報の追加、店舗代表者のできることもできるようになっています。

・リマインダーメール

　予約のある日の当日の朝９時にリマインダーメールを来るようになっています。

・店舗一覧ソート機能

　ランダム、評価が高い順、評価が低い順にできます。また、評価が一件もない店舗の場合は、「評価が高い順」「評価が低い順」のどちらの場合でも最後尾に表示されるようになっています。

・csvインポート

　管理画面からcsvをインポートすることで、店舗情報を追加することができます。またcsvのインポートは管理者のみできる仕様になっています。

## 使用技術(実行環境)
・laravel 8.83.8

・mysql 8.0.26

・PHP 7.4.9

## テーブル設計
![Rese_table](https://github.com/riechii/rese/blob/main/rese_table.png)

## ER図
![Rese_er](https://github.com/riechii/rese/blob/main/Rese_er.png)
## 環境構築
1 laravelプロジェクトを実行したいディレクトリに移動

2 $ git clone git@github.com:riechii/rese.git .

3 $ docker-compose up -d --build

4 Dockerのコンテナに入る $ docker-compose exec php bash

5 composerをインストール　$ composer install

6 Stripe PHPライブラリをインストールする $ composer require stripe/stripe-php

7 QRコード作成のライブラリをインストールする $ composer require simplesoftwareio/simple-qrcode


8 .evnの作成　$ cp .env.example .env

9 APP_KEYを作成　$ php artisan key:generate

10 .envの設定を変える

DB_HOST=DBコンテナのサービス名、 DB_DATABASE、DB_USERNAME、DB_PASSWORD、docker-compose.ymlで作成したデータベース名、ユーザ名、パスワードを記述

STRIPE_KEYとSTRIPE_SECRETも記述

メール設定も行う

11 画像をストレージに保存するためのシンボリックリンクの作成 $ php artisan storage:link

12 テーブル作成　$ php artisan migrate

13 ダミーデータの作成　$ php artisan db:seed

localhost:80（Nginxコンテナのポートを80にした場合）にアクセスすると表示されます。
## aws
awsではバックエンドをEC2、データベースをRDS(Mysql)、ストレージをS3で作成しております。

57.180.55.146

## 使用技術(実行環境)
・laravel 8.83.8

・mysql 8.0.35

・PHP 8.0.2

## csvファイル記述方法
（例）

店舗名,地域,ジャンル,店舗概要,画像URL
寿司の店A,東京都,寿司,ここに店舗概要を入力してください,https://example.com/sushi.png
ラーメン屋B,大阪府,ラーメン,ここに店舗概要を入力してください,https://example.com/ramen.png
焼肉レストランC,福岡県,焼肉,ここに店舗概要を入力してください,https://example.com/yakiniku.png
イタリアンD,東京都,イタリアン,ここに店舗概要を入力してください,https://example.com/italian.png

・一番上の行は読み込まれません。

・順番は店舗名,地域,ジャンル,店舗概要,画像URLの順でお願いします。

・項目は全て入力必須

・店舗名：50文字以内

・地域：「東京都」「大阪府」「福岡県」のいずれか

・ジャンル：「寿司」「焼肉」「イタリアン」「居酒屋」「ラーメン」のいずれか

・店舗概要：400文字以内

・画像URL：URL の形式で、jpeg、pngのみアップロード可能

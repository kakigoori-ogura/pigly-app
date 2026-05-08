#「pigly」体重管理アプリ

## 環境構築

```bash
Dockerビルド
・git clone git@github.com:kakigoori-ogura/mogitate-app.git
・compose up -d
・compose exec app php artisan migrate
・compose exec app php artisan db:seed

Laravel環境構築
・ docker-compose exec php bash
・composer install
・cp .env.example.env
・php artisan key:generate

```

## 使用技術

- PHP 8.5.3
- Laravel 12.56.0
- MySQL 8.4.8
- Docker 28.3.2
- Docker Compose

## ER図

![ER図](er-diagram.png)

## URL

http://localhost/register
http://localhost/logs/create
http://localhost/weight/initial
http://localhost/dashboard

- 開発一覧：http://localhost
- 商品登録：http://localhost/items/create
- 商品詳細：http://localhost/items/{id}
- 商品編集：http://localhost/items/{id}/edit
  ※ {id} には商品IDが入ります（例：/items/1）
